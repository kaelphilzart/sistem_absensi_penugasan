@extends('layouts.sidebar_magang')

@section('title', 'Data Task')

@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role=""alert>
        {{ Session::get('success') }}
    </div>
@endif

<div class="container">
    <h4 class="text-center pt-2"><b>Daftar Task</b></h4>
    @foreach ($dataTask as $data)
    <div class="col-md-12 d-flex flex-col py-2">
        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title">{{ $data->subject }}</h5>
                    </div>
                    <div class="col-md-6 text-end">
    <span class="deadline" data-deadline="{{ $data->deadline }}">{{ $data->deadline }}</span>
</div>
</div>

                <p class="card-text">{{ $data->description }}</p>

                <div class="row">
                    <div class="col-md-6">
                        @if($data->file_path)
                            @php
                                $fileName = basename($data->file_path);
                            @endphp
                            <a href="{{ asset($data->file_path) }}" target="_blank">Modul : {{ $fileName }}</a>
                        @else
                            Tidak ada file
                        @endif
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="#" id="submit-link-{{ $data->id }}" class="numpuk" data-bs-toggle="modal" data-bs-target="#numpukTugas{{$data->id}}">Submit Task</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('task.numpuk')
    @endforeach
</div>

<style>
    .red-text {
        color: red;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    // Ambil semua elemen dengan class "deadline"
    const deadlines = document.querySelectorAll(".deadline");
    
    // Fungsi untuk menghitung countdown atau menampilkan pesan terlambat
    function updateCountdown() {
        deadlines.forEach((deadlineElement) => {
            const deadline = moment(deadlineElement.getAttribute("data-deadline"));
            const now = moment();

            if (now.isAfter(deadline)) {
                // Waktu saat ini lebih besar dari waktu deadline
                deadlineElement.textContent = "Sudah melebihi deadline";
                deadlineElement.classList.add("red-text");
            } else {
                // Hitung countdown jika waktu masih sebelum deadline
                const duration = moment.duration(deadline.diff(now));
                const days = Math.floor(duration.asDays());
                const hours = duration.hours();
                const minutes = duration.minutes();
                const seconds = duration.seconds();

                const countdownText = `${days} days ${hours} hours ${minutes} minutes ${seconds} seconds`;
                deadlineElement.textContent = countdownText;
            }
        });
    }

    // Panggil fungsi updateCountdown secara berkala
    updateCountdown(); // Pertama kali saat halaman dimuat
    setInterval(updateCountdown, 1000); // Perbarui setiap detik
</script>



@endsection
