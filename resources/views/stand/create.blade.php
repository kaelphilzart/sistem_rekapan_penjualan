
@extends('layouts.user_type.auth')


@section('title', 'Aplikasi Laravel')

@section('content')
<br>
<div class="container">
    <div class="row">
    <div class="col-md-8 offset-md-2">
        <h4>Tambah Stand</h4>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <form action="{{route('stand.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Stand <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_stand" id="nama_stand">
            </div>
            <div class="form-group">
                <label>Alamat <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="alamat" id="alamat">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/tampil-stand" class="btn btn-success">Kembali</a>
            </div>
        </form>
    </div>
</div>
</div>

@endsection