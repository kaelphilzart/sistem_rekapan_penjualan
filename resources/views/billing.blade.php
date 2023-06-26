@extends('layouts.user_type.auth')

@section('title','Data riwayat')


@section('content')
<div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Data Riwayat</h5>
                        </div>
                        
                    </div>
                </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th width="40px"><b>No.</b></th>
            <th width="180px">Nama Mahasiswa</th>
            <th width="100px">NIM</th>
            <th width="100px">Angkatan</th>
            <th >Judul Skripsi</th>
            <th width="210px">Action</th>
          </tr>
      </thead>
    </table>
</div>
@endsection