@extends('layouts.app')

@section('content')
<style>
    .verify-container {
        margin-top: 50px;
    }

    .verify-card {
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        border: 2px solid #d32f2f; /* Rode rand */
    }

    .verify-card .card-header {
        background-color: #d32f2f;
        color: white;
        font-size: 1.5rem;
        text-align: center;
        border-radius: 10px 10px 0 0;
        padding: 15px;
    }

    .verify-card .card-body {
        padding: 30px;
        text-align: center;
    }

    .verify-card .btn-link {
        color: #d32f2f; /* Rode kleur voor de link */
        font-weight: bold;
        text-decoration: underline;
    }

    .verify-card .alert-success {
        font-size: 1rem;
        margin-bottom: 20px;
        color: #388e3c; /* Groen voor success message */
        border-left: 5px solid #388e3c; /* Groen accent op de linkerkant */
        background-color: #e8f5e9;
        padding: 10px;
    }
</style>

<div class="container verify-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card verify-card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    <p>{{ __('If you did not receive the email') }},</p>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
