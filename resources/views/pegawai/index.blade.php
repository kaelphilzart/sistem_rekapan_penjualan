@extends('layouts.user_type.auth')

@section('title','Data Pegawai')


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
                            <h5 class="mb-0">Data Karyawan</h5>
                        </div>
                        <a href="{{route('pegawai.create')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Tambah Karyawan</a>
                        <!-- <a href="{{route('pdfPegawai')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">Cetak</a> -->
                    </div>
                </div>
      <table class="table table-striped">
        <thead>
        <tr>
            <th style = "width: 7%">Id</th>
            <th style = "width: 12%">Nama</th>
            <th style = "width: 12%">Email</th>

            <th style = "width: 12%">Level</th>
            <th style = "width: 12%">Aksi</th>
            </tr>
      </thead>
      <tbody>
            @foreach ($dataPegawai as $data)
            <tr>
                <td> {{ $data->id }}</td>
                <td> {{ $data->name }}</td>
                <td> {{ $data->email }}</td>

                <td> {{ $data->level }}</td>
                <!-- <td> {{ $data->alamat }}</td> -->
                <td>
                <!-- <a href="{{route('pegawai.edit', $data->id)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span> -->
                    <form action="{{route('pegawai.destroy', $data->id)}}" method="post">@csrf
                    <a href="{{route('pegawai.update', $data->id)}}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" onClick="return confirm('Yakin Hapus Data?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection