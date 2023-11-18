@extends('layouts.user_type.auth')

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
                        <a href="{{route('pdfPresensi')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">Cetak</a>
                    </div>
                </div>
      <table class="table table-striped">
        <thead>
        <tr>
            <th style = "width: 7%">Id</th>
            <th style = "width: 10%">Stand</th>
            <th style = "width: 12%">Nama</th>
            <th style = "width: 8%">Tanggal</th>
            <th style = "width: 12%">Status</th>
            
            </tr>
      </thead>
      <tbody>
            @foreach ($dataPresensi as $data)
            <tr>
                <td> {{ $data->id }}</td>
                <td> {{ $data->stand }}</td>
                <td> {{ $data->nama }}</td>
                <td> {{ $data->tanggal }}</td>
                <td> {{ $data->status }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection