@extends('layouts.sidebar')

@section('title','Data Bidang')


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
                            <h5 class="mb-0">Data Bidang</h5>
                        </div>
                        <a href="{{route('admin.create-bidang')}}" class="btn bg-gradient-info btn-sm mb-2" type="button">+&nbsp; Tambah Bidang</a>
                    </div>
                </div>
                <div class="table-responsive">
      <table class="table table-striped ">
        <thead>
        <tr>
            <th style = "width: 7%">No</th>
            <th style = "width: 12%">Nama Bidang</th>
            <th style = "width: 12%">Deskripsi</th>
            <th style = "width: 12%">Aksi</th>
            </tr>
      </thead>
      <tbody>
            @foreach ($dataBidang as $index => $data)
            <tr class="tabel">
                <td>{{ $index + 1 }}</td>
                <td> {{ $data->bidang }}</td>
                <td > {{ $data->deskripsi }}</td>
                <td>
         
                    <form action="{{route('admin.destroy-bidang', $data->id_bidang)}}" method="post">@csrf
                    <!-- <a href="{{route('admin.edit-bidang', $data->id_bidang)}}" class="btn btn-warning">Edit</a>
                     -->
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