@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                <p>Username: {{ $user->name }}</p>
                <p>Acount created on: {{ $user->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
