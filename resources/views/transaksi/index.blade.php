@extends('layouts.user_type.auth')

@section('title','Data Penjualan')

@section('content')




@if(Session::has('success'))
    <div class="alert alert-success" role=""alert>
        {{Session::get('success')}}
    </div>
    @endif


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <Script>
        // Ambil referensi tabel
var table = document.getElementById("rekap");

// Loop melalui setiap sel di kolom Rupiah dan memformat nilainya
var cells = table.getElementsByTagName("td");
for (var i = 0; i < cells.length; i++) {
  var cell = cells[i];
  if (cell.cellIndex === 1) { // Hanya format kolom Rupiah (indeks 1)
    var angka = parseFloat(cell.textContent);
    var formatRupiah = angka.toLocaleString("id-ID", { style: "currency", currency: "IDR" });
    cell.textContent = formatRupiah;
  }
}

    </Script>
<div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Data Penjualan</h5>
                        </div>
                        <a href="{{route('transaksi.create')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">Transaksi</a>
                    </div>
                </div>
      <table class="table table-striped" id="rekap">
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
</div>
@endsection