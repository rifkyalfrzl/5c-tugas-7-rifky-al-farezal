<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Orang;
use Illuminate\Http\Request;

class OrangController extends Controller
{
    public function index(){
        $orangs = Orang::get();
        return view('orang.index', compact('orangs'));
    }

    public function create(){
        return view('orang.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nik' => 'required|numeric',
            'nama_orang' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        Orang::create($validate);
        return redirect() -> route('orang.index') -> with('message', "Data orang {$validate['nama_orang']} berhasil ditambahkan");
    }

    public function destroy(Orang $orang){
        $orang->delete();
        return redirect()->route('orang.index') -> with('message', "Data orang {$orang->nama_orang} berhasil dihapus");
    }

    public function edit(Orang $orang){
        return view('orang.edit', compact('orang'));
    }

    public function update(Request $request, Orang $orang){
        $validate = $request->validate([
            'nik' => 'required|numeric',
            'nama_orang' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        $orang -> update($validate);

        return redirect() -> route('orang.index') -> with('message', "Data orang {$orang->nama_orang} berhasil diubah");
    }

    public function show(Orang $orang)
    {
        return view('orang.show', compact('orang'));
    }

    public function take(Orang $orang){
        $banks = Bank::get();
        return view('orang.take', compact('orang', 'banks'));
    }

    public function takeStore(Request $request, Orang $orang){
        $banks = Bank::find($request->bank_id);
        $orang -> banks() -> sync($banks);

        return redirect() -> route('orang.index') -> with('message', 'Berhasil menambahkan Data');
    }
}
