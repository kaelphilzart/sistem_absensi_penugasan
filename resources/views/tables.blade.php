@extends('layouts.user_type.auth')

@section('title','Data Pegawai')


@section('content')

<div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Data Presensi</h5>
                        </div>
                        
                    </div>
                </div>
      <table class="table table-striped">
        <thead>
        <tr>
            <th style = "40px">No.</th>
            <th style = "180px">Id</th>
            <th style = "100px">Nama</th>
            <th style = "100px">Email</th>
            <th style = "100px">Password</th>
            <th style = "100px">No Hp</th>
            <th style = "100px">Alamat</th>
            <th style = "100px">Aksi</th>
            </tr>
      </thead>

    </table>
</div>
@endsection