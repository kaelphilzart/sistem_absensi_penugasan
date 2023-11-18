@extends('layouts.sidebar_magang')
@section('content')
<div class="content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Selamat Datang') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to Aptikma') }}
                    {{Auth::user()->name}}
                 <p> <strong>
                    
                        
                    @if(Auth::user()->Absensi)
                   Anda {{ Auth::user()->Absensi->keterangan }} <br>
                    Waktu Pulang Anda Adalah : <span class="text-primary"> 
                    {{ Auth::user()->Absensi->waktu_pulang }}
                    @else
                        Silakan Absen Terlebih dahulu
                    @endif
                        </span>
                        </strong>
                    </p>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
