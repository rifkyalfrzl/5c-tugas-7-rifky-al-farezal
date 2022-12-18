@extends('Layout.master')
@section('title','Data Bank')
@section('menu1','active')

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
                    <h2>Data orang</h2>
                    <a href="{{route('orang.create')}}" class="btn bg-maroon">Tambah</a>
                </div>
                <p>Dibawah ini merupakan semua Data Calon Nasabah</p>
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
                                <th align="center" class="align-middle" rowspan="2">NIK</th>
                                <th align="center" class="align-middle" rowspan="2">Nama orang</th>
                                <th align="center" class="align-middle" rowspan="2">Jenis Kelamin</th>
                                <th align="center" class="align-middle" rowspan="2">Kartu Bank</th>
                                <th align="center" class="align-middle" rowspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orangs as $orang)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$orang->nik}}</td>
                                    <td align="center">{{$orang->nama_orang}}</td>
                                    <td align="center">{{$orang->jenis_kelamin}}</td>
                                    <td align="center">
                                        @forelse ($orang->banks as $item)
                                            <ul>
                                                <li>
                                                    {{$item->jenis_kartu}}
                                                </li>
                                            </ul>
                                        @empty
                                            Tidak ada Kartu Bank
                                        @endforelse
                                    </td>
                                    <td align="center "class="text-center">
                                        <form action="{{ route('orang.destroy',$orang->id) }}" method="POST">
                                            <a href="{{ route('orangs.take',$orang->id) }}" class="btn btn-info">Kartu BANK</a>
                                            <a href="{{ route('orang.edit',$orang->id) }}" class="btn btn-warning">Edit</a>
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
