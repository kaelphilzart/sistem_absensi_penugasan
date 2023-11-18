
@extends('layouts.sidebar_leader')


@section('title', 'Tambah Task')

@section('content')
<div class="container">
    <h4 class="text-center py-2 "><b>Tugas Baru</b></h4>
    <div class="col-md-12">
        <form role="form text-left" method="POST" action="{{route('buat-task')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Subject" name="subject" id="subject" aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
              @error('subject')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" name="description" id="description"></textarea>
                    <label for="floatingTextarea">Deskripsi Tugas</label>
                  </div>
                @error('description')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="datetime-local" class="form-control" name="deadline" id="deadline">
                @error('deadline')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="file_path" id="file_path">
                @error('file_path')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="text-center">
              <button type="submit" class="btn bg-gradient-info w-100 mt-2 mb-2">Done</button>
            </div>
        </form>
    </div>
</div>

@endsection