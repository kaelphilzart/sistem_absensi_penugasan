<div>
    {{-- The Master doesn't talk, he acts. --}}
    @extends('layouts.user_type.auth')

@section('title','Data Penjualan')


@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role=""alert>
        {{Session::get('success')}}
    </div>
    @endif
   


<div class="col-12">
@livewire('livewire.penjualan-index')
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Data Penjualan</h5>
                        </div>
                        
            <div class="dropdown" id="filterDropdownContainer">
            <select  class="btn btn-gray " name="dropdown" id="dropdown">
     <i class="fas fa-filter"><option value="">Filter</option></i>
    <option value="1">
    <a class="nav-link {{ (Request::is('filter-menu') ? 'active' : '') }} " href="{{ url('filter-menu') }}">    
    Paling Laris</option>
    <option value="2">stand teramai</option>
    <option value="3">tanggal</option>
</select>
  </div>
</div>

                <!-- </div>
      <table class="table table-striped">
      <form action="{{ route('cari-penjualan') }}" method="GET">
    <div class="input-group mb-4 mx4">
    <input type="text" name="keyword" class="mb-4 mx-4" placeholder="cari..">
    <button class="btn btn-primary" type="submit" >
        Cari
        </button>
        </div> -->
        <div class="col">
	<input wire:model="search" type="text" class="form-control" form-control-sm placeholder="cari">
</div> 
        <table>
        <thead>
        <tr>
            <th style = "width: 5%">Id</th>
            <th style = "width: 10%">Stand</th>
            <th style = "width: 10%">Tanggal</th>
            <th style = "width: 10%">Kasir</th>
            <th style = "width: 10%">Menu</th>
            <th style = "width: 10%">Harga</th>
            <th style = "width: 10%">Jumlah</th>
            <th style = "width: 10%">Total</th>
            </tr>
      </thead>
      <tbody>
  
            @foreach ($dataPenjualan as $data)
            <tr>
                <td> {{ $data->id }}</td>
                <td> {{ $data->stand }}</td>
                <td> {{ $data->tanggal }}</td>
                <td> {{ $data->nama }}</td>
                <td> {{ $data->menu }}</td>
                <td> {{ $data->harga }}</td>
                <td> {{ $data->jumlah }}</td>
                <td> {{ $data->total }}</td>
            </tr>
            @endforeach
   
        </tbody>
    </table>
    </form>
</div>
@endsection

</div>
