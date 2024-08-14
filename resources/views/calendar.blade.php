@extends('layouts.app')

@section('content')
<style>
    .calendar-section {
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .calendar-section .card-header {
        background-color: #d32f2f;
        color: white;
        font-size: 1.5rem;
        border-radius: 10px 10px 0 0;
        padding: 15px;
        text-align: center;
    }

    .calendar-section .table th {
        background-color: #d32f2f;
        color: white;
        text-align: center;
    }

    .calendar-section .table tbody tr:hover {
        background-color: #f5f5f5;
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

    .btn-edit, .btn-delete, .btn-add {
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
        cursor: pointer;
    }

    .btn-edit {
        background-color: white;
        color: black;
        border-width: 2px;
        border-color: #f0f0f0;
        margin-right: 5px;
    }

    .btn-edit:hover {
        background-color: #f0f0f0;
        color: black;
    }

    .btn-delete {
        background-color: #dc3545;
        border-width: 2px;
        color: white;
    }

    .btn-delete:hover {
        background-color: #c82333;
        color: white;
    }

    .btn-add {
        background-color: #d32f2f;
        color: white;
        margin-top: 20px;
    }

    .btn-add:hover {
        background-color: #b71c1c;
        color: white;
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($games as $game)
                                    <tr>
                                        <td>{{ $game->opponent }}</td>
                                        <td>{{ $game['home/away'] }}</td>
                                        <td>{{ $game['league/cup'] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($game->date)->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-edit">
                                                Edit
                                            </a>

                                            <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this game?');">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <div class="text-center">
                        <a href="{{ route('games.create') }}" class="btn btn-add">
                            Add Game
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection