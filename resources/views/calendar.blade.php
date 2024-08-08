@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Calendar</div>
                <div class="card-body">
                    @if($games->isEmpty())
                        <p>No upcoming games at the moment.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Opponent</th>
                                    <th>Home/Away</th>
                                    <th>League/Cup</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($games as $game)
                                    <tr>
                                        <td>{{ $game->opponent }}</td>
                                        <td>{{ $game['home/away'] }}</td>
                                        <td>{{ $game['league/cup'] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($game->date)->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
