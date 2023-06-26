@extends('layout.master')

@section('title', 'Aplikasi Laravel')

@section('content')
<h2>Data Produk</h2>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Stok</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Samsung Galaxy Note 8</td>
      <td>30</td>
      <td>Rp 8.000.000</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Iphone 11</td>
      <td>20</td>
      <td>Rp 5.000.000</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Samsung Galaxy Tab</td>
      <td>10</td>
      <td>Rp 7.000.000</td>
    </tr>
  </tbody>
</table>
@endsection