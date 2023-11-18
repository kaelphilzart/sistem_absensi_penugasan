@extends('layouts.sidebar_leader')

@section('title','Data Task')


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
                            <h5 class="mb-0">Data Task</h5>
                        </div>
                        <a href="{{route('create-task')}}" class="btn bg-gradient-info btn-sm mb-2" type="button">+&nbsp; Tambah Task</a>
                 
                         </div>
                         
                </div>
                <div class="table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
            <th style = "width: 7%">No</th>
            <th style = "width: 12%">Subject</th>
            <th style = "width: 8%">Deskripsi</th>
            <th style = "width: 12%">Deadline</th>
            <th style = "width: 10%">File Path</th>
            <th style = "width: 10%">Aksi</th>
            </tr>
      </thead>
      <tbody>
            @foreach ($dataTask as $key => $data)
            <tr>
                <td> {{ $key + 1 }}</td>
                <td> {{ $data->subject}}</td>
                <td> {{ $data->description }}</td>
                <td> {{ $data->deadline }}</td>
                <td> 
                @if($data->file_path)
    @php
        $fileName = basename($data->file_path);
    @endphp
    <a href="{{ asset($data->file_path) }}" target="_blank">{{ $fileName }}</a>
@else
    Tidak ada file
@endif
        </td>
        <td>
         
         <form action="{{route('task.hapus-task', $data->id)}}" method="post">@csrf
         <button class="btn btn-danger" onClick="return confirm('Yakin Hapus Task?')">Delete</button>
         </form>
     </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection