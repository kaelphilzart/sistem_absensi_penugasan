@extends('layouts.sidebar_leader')

@section('title','Data Pengerjaan')


@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role=""alert>
        {{Session::get('success')}}
    </div>
    @endif

<div class="container">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
<div class="table-responsive">
<table class="table table-striped">
        <thead>
        <tr>
            <th style = "width: 7%">No</th>
            <th style = "width: 12%">Subject Tugas</th>
            <th style = "width: 12%">Nama Pengumpul</th>
            <th style = "width: 12%">Deadline</th>
            <th style = "width: 12%">mengumpulkan</th>
            <th style = "width: 12%">File</th>
            </tr>
      </thead>
      <tbody>
            @foreach ($dataPengerjaan as $key =>  $data)
            <tr>
                <td> {{ $key + 1 }}</td>
                <td> {{ $data->subject }}</td>
                <td> {{ $data->name }}</td>
                <td> {{ $data->deadline }}</td>
                <td> {{ $data->created_at }}</td>
                <td> 
    @php
        $fileName = basename($data->tugas);
    @endphp
    <a href="{{ asset($data->tugas) }}" target="_blank">{{ $fileName }}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
      
</div>


@endsection