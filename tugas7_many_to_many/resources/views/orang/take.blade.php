@extends('Layout.master')
@section('title','Data Bank')
@section('menu','active')

@section('content')
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <h3 class="fw-bold">Ambil Jenis Kartu</h3>
                <div class="card-body">
                    <form action="{{route('orangs.takeStore',['orang' => $orang->id])}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="bank_id" class="form-label">Pilih Kartu Bank</label>
                            <div class="form-group">
                                @foreach ($banks as $item)
                                <div class="form-check
                                form-check-inline">
                                    <input type="checkbox" name="bank_id[]" id="{{$item->id}}" class="form-check-input" value="{{$item->id}}">
                                    <label for="{{$item->id}}" class="form-check-label">{{$item->nama_bank}} - {{$item->jenis_kartu}}</label>
                                </div>
                                @endforeach
                            </div>
                            <p></p>
                            <button type="submit" class="btn btn-info">Ambil Jadwal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
