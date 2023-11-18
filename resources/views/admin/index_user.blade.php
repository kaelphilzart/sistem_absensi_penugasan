@extends('layouts.sidebar')

@section('title','Data Pengguna')


@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role=""alert>
        {{Session::get('success')}}
    </div>
    @endif

<div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Data Pengguna</h5>
                        </div>
                        <a href="{{route('admin.create')}}" class="btn bg-gradient-info btn-sm mb-2" type="button">+&nbsp; Tambah Pengguna</a>
                    </div>
                </div>
                <div class="table-responsive">
                <table class="table table-striped">
        <thead>
        <tr>
            <th style = "width: 7%">No</th>
            <th style = "width: 12%">Nama</th>
            <th style = "width: 12%">Email</th>

            <th style = "width: 12%">Level</th>
            <th style = "width: 12%">Aksi</th>
            </tr>
      </thead>
      <tbody>
            @foreach ($dataUser as $key => $data)
            <tr>
                <td> {{ $key + 1 }}</td>
                <td> {{ $data->name }}</td>
                <td> {{ $data->email }}</td>

                <td> {{ $data->level }}</td>
                
                <td>
         
                    <form action="{{route('admin.destroy-pengguna', $data->id)}}" method="post">@csrf
                    <a href="{{route('admin.edit-pengguna', $data->id)}}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" onClick="return confirm('Yakin Hapus Data?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

                </div>
</div>
@endsection