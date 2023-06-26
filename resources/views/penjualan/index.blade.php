@extends('layouts.user_type.auth')

@section('title','Data Penjualan')


@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role=""alert>
        {{Session::get('success')}}
    </div>
    @endif
   


<div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Data Penjualan</h5>
                        </div>
                        
            <!-- <div class="dropdown" id="filterDropdownContainer">
            <select  class="btn btn-gray " name="dropdown" id="dropdown">
     <i class="fas fa-filter"><option value="">Filter</option></i>
    <option value="1">
    <a class="nav-link {{ (Request::is('filter-menu') ? 'active' : '') }} " href="{{ url('filter-menu') }}">    
    Paling Laris</option>
    <option value="2">stand teramai</option>
    <option value="3">tanggal</option>
</select>
  </div> -->
  <!-- <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
    data-mdb-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li>
      <a class="dropdown-item" href="#">Another action</a>
    </li>
    <li>
      <a class="dropdown-item" href="#">
        Submenu &raquo;
      </a>
      <ul class="dropdown-menu dropdown-submenu">
        <li>
          <a class="dropdown-item" href="#">Submenu item 1</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Submenu item 2</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Submenu item 3 &raquo; </a>
          <ul class="dropdown-menu dropdown-submenu">
            <li>
              <a class="dropdown-item" href="#">Multi level 1</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Multi level 2</a>
            </li>
          </ul>
        </li>
        <li>
          <a class="dropdown-item" href="#">Submenu item 4</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Submenu item 5</a>
        </li>
      </ul>
    </li>
  </ul>
</div> -->
</div>

                <!-- </div>
      
      <form action="/tampil-penjualan" method="GET">
    <div class="input-group mb-4 mx4">
    <input type="text" name="keyword" class="mb-4 mx-4" placeholder="cari..">
    
        Cari
        </button>
        </div> -->
     
  <form class="row g-3" action="/tampil-penjualan" method="GET">
  <div class="col-auto">
    <label for="inputPassword2" class="visually-hidden">Nama Karyawan</label>
    <input type="search" name="search"class="form-control" id="inputPassword2" placeholder="Nama Karyawan">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Cari</button>
  </div>
</form>
  <table class="table table-striped">
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