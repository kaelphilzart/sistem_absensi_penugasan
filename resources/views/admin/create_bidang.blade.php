
@extends('layouts.sidebar')


@section('title', 'Tambah Bidang')

@section('content')
<section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 mx-3 border-radius-lg">
      <span class="mask bg-gradient-dark opacity-6"></span>
      
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Tambah Bidang</h5>
            </div>
            
            <div class="card-body">
              <form role="form text-left" method="POST" action="{{ route('admin.tambah-bidang') }}">
                @csrf
                <div class="mb-3 text-center">
                  <input type="text" class=" col-md-8 col-8" placeholder="Bidang Apa ?" name="bidang" id="bidang" value="{{ old('bidang') }}">
                  @error('name')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3 text-center">
                  <textarea name="deskripsi" id="deskripsi" class="col-md-8 col-8 " placeholder="Tugasnya....."></textarea>
                  @error('deskripsi')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 mt-2 mb-2 col-md-8 col-8">Tambah Bidang</button>
                </div>
              </form>
              <div class="text-center">
              <a href="{{route('admin.tampil-bidang')}}" class="btn bg-gradient-info w-100 mb-2 col-md-8 col-8 ">Kembali</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection