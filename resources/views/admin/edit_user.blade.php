

@extends('layouts.sidebar')

@section('title', 'Edit Pengguna')

@section('content')

<br>
<div class="container">
    <div class="row">
    <div class="col-md-8 offset-md-2">
        <h4>Edit Pengguna</h4>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <form action="{{route('admin.update-pengguna', $data->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name" id="name" value="{{$data->name}}">
            </div>
            
            <!-- <div class="form-group">
                <label>Password<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name" id="name" value="{{$data->password}}">
            </div> -->
            <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="email" id="email" value="{{$data->email}}">
            </div>
            <div class="form-floating mb-3">
                    <select class="form-select ml-2" id="level" aria-label="Floating label select example" name="level">
                        <option value="admin">Admin</option>
                        <option value="leader">Leader</option>
                        <option value="magang">Magang</option>
                    </select>
                    <label for="floatingSelect">Level</label>
                </div>
            <br>
            <div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('admin.tampil-pengguna')}}" class="btn btn-success">Kembali</a>
            </div>
        </form>
    </div>
</div>
</div>

@endsection