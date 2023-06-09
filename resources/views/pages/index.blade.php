@extends('layouts.main')

@section('title')
Home
@endsection

@section('content')
<div class="col-md-8 mx-auto my-4">
    <div class="card">
        <div class="card-header">
            Data Mahasiswa
        </div>
        <div class="col-md-12 card-body">
            <!-- <h5 class="card-title"></h5> -->
            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a> -->
            <a href="{{route('create')}}"><button class="btn btn-primary mt-1 mb-4">Tambah</button></a>

            <form action="{{route('index')}}" method="GET">
                <div class="col-md-3 input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari mahasiswa" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NBI</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $key => $mhs)
                <tr>
                    <td>{{$key + $mahasiswas->firstItem()}}</td>
                    <td>{{$mhs->nama}}</td>
                    <td>{{$mhs->nbi}}</td>
                    <td>{{$mhs->fakultas->nama}}</td>
                    <td>{{$mhs->program_studis->nama}}</td>
                    <td class="d-flex">
                        <a href="{{route('edit', ['id' => $mhs->id])}}">
                            <button class="btn btn-warning">Edit</button>
                        </a>
                        <form action="{{route('delete', ['id' => $mhs->id])}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger mx-1">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>

            <div>
                Halaman : {{$mahasiswas->currentPage()}}
            </div>

            <div>
                Jumlah Data : {{$mahasiswas->total()}}
            </div>

            <div> 
                Data Per Halaman : {{$mahasiswas->perPage()}}
            </div>

            <div class="mt-3">
                {{ $mahasiswas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection