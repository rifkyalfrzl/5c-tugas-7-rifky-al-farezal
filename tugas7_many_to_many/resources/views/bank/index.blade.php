@extends('Layout.master')
@section('title','Data Bank')
@section('menu','active')

@section('content')
    <style>
        .bg-maroon {
            background-color: maroon;
            color: white;
        }
        .text-maroon {
            color: maroon;
            font-weight: bold
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h2>Data bank</h2>
                    <a href="{{route('bank.create')}}" class="btn bg-maroon">Tambah</a>
                </div>
                <p>Dibawah ini merupakan semua data bank</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" align="center">
                        <thead>
                            <tr align="center">
                                <th align="center" class="align-middle" rowspan="2">#</th>
                                <th align="center" class="align-middle" rowspan="2">Kode bank</th>
                                <th align="center" class="align-middle" rowspan="2">Nama bank</th>
                                <th align="center" class="align-middle" rowspan="2">Jenis Kartu</th>
                                <th align="center" class="align-middle" rowspan="2">orang</th>
                                <th align="center" class="align-middle" rowspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($banks as $bank)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$bank->kode_bank}}</td>
                                    <td align="center">{{$bank->nama_bank}}</td>
                                    <td align="center">{{$bank->jenis_kartu}}</td>
                                    <td align="center">
                                        @forelse ($bank->orangs as $item)
                                            <ul>
                                                <li>
                                                    {{$item->nama_orang}}
                                                </li>
                                            </ul>
                                        @empty
                                            Tidak ada orang
                                        @endforelse
                                    </td>
                                    <td align="center "class="text-center">
                                        <form action="{{ route('bank.destroy',$bank->id) }}" method="POST">
                                            <a href="{{ route('bank.edit',$bank->id) }}" class="btn btn-warning">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="11">Tidak ada data...</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
