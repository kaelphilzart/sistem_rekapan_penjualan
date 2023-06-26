

@extends('layouts.user_type.auth')


@section('content')

<br>
<div class="container">
    <div class="row">
    <div class="col-md-8 offset-md-2">
        <h4>Edit Karyawan</h4>
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
        <form action="{{route('pegawai.update', $data->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Id <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="id" id="id" value="{{$data->id}}">
            </div>
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name" id="name" value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="email" id="email" value="{{$data->email}}">
            </div>
            <div class="form-group">
                <p>Sebagai</p>
                   <p><input type='radio' name='level' id="level" value='admin' />Admin</p>
                   <p><input type='radio' name='level' id="level" value='karyawan' />Karyawan</p>
                 @error('level')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
            <br>
            <div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/tampil-karyawan" class="btn btn-success">Kembali</a>
            </div>
        </form>
    </div>
</div>
</div>

@endsection