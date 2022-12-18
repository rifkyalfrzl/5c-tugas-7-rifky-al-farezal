<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index(){
        $banks = Bank::get();
        return view('bank.index', compact('banks'));
    }

    public function create(){
        return view('bank.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'kode_bank' => 'required',
            'nama_bank' => 'required',
            'jenis_kartu' => 'required'
        ]);

        Bank::create($validate);
        return redirect() -> route('bank.index') -> with('message', "Data Bank {$validate['nama_bank']} berhasil ditambahkan");
    }

    public function destroy(Bank $bank){
        $bank->delete();
        return redirect()->route('bank.index') -> with('message', "Data bank {$bank->nama_bank} berhasil dihapus");
    }

    public function edit(Bank $bank){
        return view('bank.edit', compact('bank'));
    }

    public function update(Request $request, Bank $bank){
        $validate = $request->validate([
            'kode_bank' => 'required',
            'nama_bank' => 'required',
            'jenis_kartu' => 'required'
        ]);

        $bank -> update($validate);

        return redirect() -> route('bank.index') -> with('message', "Data bank {$bank->nama_bank} berhasil diubah");
    }

    public function show(Bank $bank)
    {
        return view('bank.show', compact('bank'));
    }
}
