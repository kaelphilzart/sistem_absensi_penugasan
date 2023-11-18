@extends('layouts.sidebar_leader')

@section('title','Data Presensi')


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
                            <h5 class="mb-0">Data Presensi</h5>
                        </div>
                         </div>
                </div>
                <div class="table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
            <th style = "width: 7%">No</th>
            <th style = "width: 12%">Nama</th>
            <th style = "width: 8%">Tanggal</th>
            <th style = "width: 12%">Status</th>
            <th style = "width: 10%">Keterangan</th>
            </tr>
      </thead>
      <tbody>
            @foreach ($dataPresensi as $key => $data)
            <tr>
                <td> {{ $key + 1 }}</td>
                <td> {{ $data->nama }}</td>
                <td> {{ $data->tanggal }}</td>
                <td> {{ $data->status }}</td>
                <td> {{ $data->keterangan }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection