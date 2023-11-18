@extends('layouts.sidebar_magang')

<!-- @section('title','Data Pegawai') -->


@section('content')

@if(Session::has('success'))
<div class="alert alert-success" role="" alert>
    {{Session::get('success')}}
</div>
@endif



<div class="col-md-12" style="margin-top: 10px;">
    <div class="col-md-12 panel">
        <div class="card card-default">
            <h3 class="text-center py-2 mt-3 col-md-12">Absensi</h3>
            <div class="col-md-12 panel-body" style="padding-bottom:25px;">
                <div class="col-md-12">

                    <form class="cmxform" action="{{route('isi-absen')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-animate-text">
                                    <label>Nama</label>
                                    <input class="form-control" type="text"  readonly
                                        value="{{auth()->user()->name}}">
                                    <input class="form-control" type="hidden" name="id_user" id="id_user" readonly
                                        value="{{auth()->user()->id}}">
										@error('id_user')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
    <div class="form-group form-animate-text">
        <label>Tanggal <span class="text-danger">*</span></label>
        <br>
        <input type="datetime-local" name="tanggal" readonly value="{{ now()->format('Y-m-d\TH:i') }}" id="tanggal" />
        @error('tanggal')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>
</div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="status" name="status"
                                        aria-label="Floating label select example">

                                        <option value="Hadir">Hadir</option>
                                        <option value="Izin">Izin</option>
                                    </select>
                                    <label for="floatingSelect">Status</label>
									@error('status')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-animate-text">
                                   
                                    <br>
                                    <input type="hidden" name="tgl" readonly value="{{ now()->format('Y-m-d') }}"
                                        id="tgl" />
										@error('tgl')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                                </div>
                            </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block" name="simpan">Done</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection