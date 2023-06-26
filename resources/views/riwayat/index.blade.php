@extends('layouts.user_type.auth')

@section('title','Data Riwayat')


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
                            <h5 class="mb-0">Data Riwayat</h5>
                        </div>
                        <a href="{{route('pdfRiwayat')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">Cetak</a>
                    </div>
                </div>
      <table class="table table-striped">
        <thead>
        <tr>
            <th style = "width: 12%">Id</th>
            <th style = "width: 12%">Tanggal</th>
            <th style = "width: 12%">Nama</th>
            <th style = "width: 12%">Kegiatan</th>
            </tr>
      </thead>
      <tbody>
            @foreach ($dataRiwayat as $data)
            <tr>
                <td> {{ $data->id }}</td>
                <td> {{ $data->tanggal }}</td>
                <td> {{ $data->nama }}</td>
                <td> {{ $data->kegiatan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection