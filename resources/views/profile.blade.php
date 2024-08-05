@extends('layouts.app')

@section('content')
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                <p>Username: {{ $user->name }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
