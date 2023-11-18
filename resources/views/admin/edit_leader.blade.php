

@extends('layouts.sidebar')

@section('title', 'Edit Leader')

@section('content')

<br>
<div class="container">
    <div class="row">
    <div class="col-md-8 offset-md-2">
        <h4>Edit Leader</h4>
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
        <form action="{{route('admin.update-leader', $data->id_leader)}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Id Leader <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name" id="id_user" value="{{$data->id_leader}}" disabled>
            </div>
            <div class="form-group">
                <label>Bidang sebelumnya<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="email" id="email" value="{{$data->bidang}}" disabled>
            </div>
            <div class="form-floating mb-3">
                    <select class="form-select" id="id_bidang" aria-label="Floating label select example" name="id_bidang">
						@foreach($data1 as $db)
                          <option value="{{ $db->id_bidang }}">{{ $db->bidang }}</option>
						  @endforeach
						</select>	
                    <label for="floatingSelect">Bidang Yang Baru</label>
                </div>
            <br>
            <div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('admin.tampil-leader')}}" class="btn btn-success">Kembali</a>
            </div>
        </form>
    </div>
</div>
</div>

@endsection