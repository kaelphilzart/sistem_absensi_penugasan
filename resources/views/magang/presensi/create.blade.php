@extends('layouts.user_type.auth')

<!-- @section('title','Data Pegawai') -->


@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role=""alert>
        {{Session::get('success')}}
    </div>
    @endif
	

	
    <div class="col-md-12" style="margin-top: 10px;">
			<div class="col-md-12 panel">
			{{-- <div class="col-md-12 panel-heading bg-teal">
				<h4 style="color: white;font-size: 20pt;">Presensi Karyawan <span class="right" style="color : #f6c700; font-weight: bold; text-align: right; padding-right: 10px;">Empty : 0</span></h4>
			</div> --}}
			<div class="card card-default">
				<div class="card-header bg-primary">
					<h3 class="text-center" style="color:white">FORM PRESENSI</h3>
				</div>
			<div class="col-md-12 panel-body" style="padding-bottom:25px;">
				<div class="col-md-12">

				<form class="cmxform" action="{{route('presensi.store')}}" method="POST">
					@csrf
					<div class="row">
					<div class="col-md-6">
					<div class="form-group form-animate-text" style="margin-top:15px !important; margin-left:10px">	
						<label>Nama</label>
						<input class="form-control" type="text" name="nama" id="nama" readonly value="{{auth()->user()->name}}">
						</div>

						<div class="form-group form-animate-text" style="margin-top:10px !important; margin-left:10px">
						<label>Stand</label>
						<select class="form-select" type="text" name="stand" id="stand">
						@foreach($dataStand as $ds)
                          <option value="{{ $ds->nama_stand }}">{{ $ds->nama_stand }}</option>
						  @endforeach
						</select>	
				</div>
						
					</div>
					<div class="col-md-6">
						<div class="form-group form-animate-text" style="margin-top:15px !important; margin-right:10px">		
                <label>Tanggal <span class="text-danger">*</span></label>
				<br>
                <input type="date" name="tanggal" readonly value="{{ now()->format('Y-m-d') }}" id="tanggal" />
            <br>
			</div>

						<div class="form-group">
              			  <label>Status <span class="text-danger">*</span></label>
              		  <select class="form-select" type="text" name="status" id="status">
                          <option value="Hadir">Hadir</option>
                          <option value="Alfa">Alfa</option>
						  <option value="Izin">Izin</option>
                    </select>
            			</div>
					</div>
					</div>
					<br>
		
			<div class="col-md-12" style="margin-left:10px">
				<button type="submit" class="btn btn-outline-primary btn-block" name="simpan">Simpan</button>
			</div>
				</form>
			</div>
			</div>
		</div>
		</div>
	  </div>
@endsection
