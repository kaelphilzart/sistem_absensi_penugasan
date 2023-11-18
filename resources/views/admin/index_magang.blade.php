@extends('layouts.sidebar')

@section('title','Data Magang')


@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role=""alert>
        {{Session::get('success')}}
    </div>
    @endif

<div class="container">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                <form class="cmxform" method="POST" action="{{ route('admin.create-magang') }}">
                     @csrf 
                    <div class="row">
                        <div class="col-md-3 mb-3 text-end">
                            <h5>Tambah Anggota Magang</h5> 
                        </div>
                        <div class="form-floating col-md-3 mb-3">
                <select class="form-select" type="text" name="user_id" id="user_id">
						@foreach($dataUser as $ds)
                          <option value="{{ $ds->id }}">{{ $ds->name }}</option>
						  @endforeach
						</select>	
                        <label class="floatingselect ml-2">Data Pengguna<span class="text-danger">*</span></label>
            </div>
                       
                        <div class="form-floating col-md-3 mb-3">
                        <select class="form-select" type="text" name="id_minat" id="id_minat">
						@foreach($dataBidang as $db)
                          <option value="{{ $db->id_bidang }}">{{ $db->bidang }}</option>
						  @endforeach
						</select>
                        <label class="floatingselect ml-2">Bidang<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-3 d-flex flex-col my-3">
                        <button type="submit" class="btn btn-info">Tambah</button>
                        </div>            
</form>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-3">Data Anggota Magang</h5>          
                        </div>              
                    </div>
                
<div class="table-responsive">
<table class="table table-striped">
        <thead>
        <tr>
            <th style = "width: 7%">No</th>
            <th style = "width: 12%">Nama</th>
            <th style = "width: 12%">Minat</th>
            <th style = "width: 12%">Aksi</th>
            </tr>
      </thead>
      <tbody>
            @foreach ($dataMagang as $key => $data)
            <tr>
                <td> {{ $key+1 }}</td>
                <td> {{ $data->name }}</td>
                <td> {{ $data->bidang }}</td>
                
                <td>
         
                    <form action="{{route('admin.destroy-magang', $data->id_magang)}}" method="post">@csrf
                    <a href="{{route('admin.edit-magang', $data->id_magang)}}" class="btn btn-warning">Edit</a>
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