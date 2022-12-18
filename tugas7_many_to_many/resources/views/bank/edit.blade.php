@extends('Layout.master')
@section('title','Data Bank')
@section('menu','active')

@section('content')
    <style>
        .bg-maroon {
            background-color: maroon;
            color: white;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Data bank</h2>
                <p>Masukkan data terkait Bank dengan lengkap</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('bank.update', ['bank' => $bank->id])}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-4">
                        <label for="kode_bank" class="form-label">Kode bank</label>
                        <input type="text" name="kode_bank" id="kode_bank" placeholder="Masukkan Kode bank" class="form-control" value="{{old('kode_bank') ?? $bank->kode_bank}}">
                        @error('kode_bank')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_bank" class="form-label">Nama bank</label>
                        <input type="text" name="nama_bank" id="nama_bank" placeholder="Masukkan Nama bank" class="form-control" value="{{old('nama_bank') ?? $bank->nama_bank}}">
                        @error('nama_bank')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kartu" class="form-label">Jenis Kartu</label>
                        <select name="jenis_kartu" id="jenis_kartu" class="form-control">
                            <option selected disabled>Pilih Jenis Kartu</option>
                            <option value="jenis_kartu Debit" {{old('jenis_kartu') ?? $bank->jenis_kartu == "jenis_kartu Debit" ? "selected" : ""}}>Kartu Debit</option>
                            <option value="jenis_kartu Kredit" {{old('jenis_kartu') ?? $bank->jenis_kartu == "jenis_kartu Kredit" ? "selected" : ""}}>Kartu Kredit</option>

                        </select>
                        @error('jenis_kartu')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bg-maroon">Edit</button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
@endsection
