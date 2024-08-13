@extends('layouts.app')

@section('content')
<style>
    .calendar-section {
        background-color: #f7f7f7; /* Lichte achtergrondkleur */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .calendar-section .card-header {
        background-color: #d32f2f; /* Rode kleur voor de header */
        color: white;
        font-size: 1.5rem;
        border-radius: 10px 10px 0 0;
        padding: 15px;
        text-align: center;
    }

    .calendar-section .table th {
        background-color: #d32f2f; /* Rode kleur voor tabel kopjes */
        color: white;
        text-align: center;
    }

    .calendar-section .table tbody tr:hover {
        background-color: #f5f5f5; /* Hover-effect voor tabel rijen */
        cursor: pointer;
    }

    .calendar-section .table tbody td {
        text-align: center;
        vertical-align: middle;
        font-size: 1.1rem;
    }

    .calendar-section .table {
        margin-top: 20px;
    }

    .calendar-section p {
        font-size: 1.2rem;
        color: #666;
        text-align: center;
        padding: 20px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card calendar-section">
                <div class="card-header">Calendar</div>
                <div class="card-body">
                    @if($games->isEmpty())
                        <p>No upcoming games at the moment.</p>
                    @else
                        <table class="table table-hover">
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
