@extends('layouts.user_type.auth')

@section('content')
<div class="content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Selamat Bekerja') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to Geprek 69') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
