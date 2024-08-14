@extends('layouts.app')

@section('content')
<style>
    .profile-section {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .profile-section .card-header {
        background-color: #d32f2f;
        color: white;
        font-size: 1.5rem;
        border-radius: 10px 10px 0 0;
        padding: 15px;
        text-align: center;
    }

    .profile-section .card-body p {
        font-size: 1.2rem;
        color: #333;
        margin-bottom: 10px;
    }

    .profile-section .card-body p:first-child {
        margin-top: 10px;
    }

    .profile-section .card-body {
        padding: 20px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card profile-section">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                    <p><strong>Username:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Account created on:</strong> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</p>
                    <p><strong>Date of birth:</strong> {{ \Carbon\Carbon::parse($user->geboortedatum)->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
