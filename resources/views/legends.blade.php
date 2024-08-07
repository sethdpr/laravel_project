@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Legends</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Nationality</th>
                                <th>Age</th>
                                <th>Competitive appearances</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($legends as $legend)
                                <tr>
                                    <td>{{ $legend->name }}</td>
                                    <td>{{ $legend->position }}</td>
                                    <td>{{ $legend->nation }}</td>
                                    <td>{{ $legend->age }}</td>
                                    <td>{{ $legend->competitive_appearances }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
