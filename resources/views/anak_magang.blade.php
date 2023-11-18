@extends('layouts.sidebar_leader')

@section('title','Data Internship')


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
            <th style = "width: 12%">Nama</th>
            <th style = "width: 12%">Minat</th>
            </tr>
      </thead>
      <tbody>
            @foreach ($dataMagang as $key =>  $data)
            <tr>
                <td> {{ $key + 1 }}</td>
                <td> {{ $data->name }}</td>
                <td> {{ $data->bidang }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
      
</div>


@endsection