@extends('layouts.app')

@section('content')
<style>
    .reset-password-container {
        margin-top: 50px;
    }

    .reset-password-card {
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    .reset-password-card .card-header {
        background-color: #d32f2f;
        color: white;
        font-size: 1.5rem;
        text-align: center;
        border-radius: 10px 10px 0 0;
        padding: 15px;
    }

    .reset-password-card .card-body {
        padding: 30px;
    }

    .reset-password-card .btn-primary {
        background-color: #d32f2f;
        border-color: #d32f2f;
        transition: background-color 0.3s ease;
    }

    .reset-password-card .btn-primary:hover {
        background-color: #b71c1c;
        border-color: #b71c1c;
    }

    .alert-success {
        background-color: #d32f2f;
        color: white;
    }
</style>

<div class="container reset-password-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card reset-password-card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
