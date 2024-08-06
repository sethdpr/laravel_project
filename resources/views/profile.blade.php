@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                <p>Username: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Acount created on: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</p>
                <p>Geboortedatum: {{ \Carbon\Carbon::parse($user->geboortedatum)->format('d/m/Y') }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
