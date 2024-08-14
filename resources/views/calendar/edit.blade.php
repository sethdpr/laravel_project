@extends('layouts.app')

@section('content')
<style>
    .form-section {
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .form-section .card-header {
        background-color: #d32f2f;
        color: white;
        font-size: 1.5rem;
        border-radius: 10px 10px 0 0;
        padding: 15px;
        text-align: center;
    }

    .form-section .form-group label {
        font-weight: bold;
    }

    .form-section .btn {
        background-color: #d32f2f;
        border-color: #d32f2f;
        color: white;
        margin-top: 10px;
    }

    .form-section .btn:hover {
        background-color: #b71c1c;
        border-color: #d32f2f;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card form-section">
                <div class="card-header">Edit Game</div>

                <div class="card-body">
                    <form action="{{ route('games.update', $game->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="opponent">Opponent</label>
                            <input type="text" id="opponent" name="opponent" class="form-control" value="{{ $game->opponent }}" required>
                        </div>

                        <div class="form-group">
                            <label for="home_away">Home/Away</label>
                            <select id="home_away" name="home_away" class="form-control" required>
                                <option value="Home" {{ $game->home_away == 'Home' ? 'selected' : '' }}>Home</option>
                                <option value="Away" {{ $game->home_away == 'Away' ? 'selected' : '' }}>Away</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="league_cup">League/Cup</label>
                            <input type="text" id="league_cup" name="league_cup" class="form-control" value="{{ $game->league_cup }}" required>
                        </div>

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" class="form-control" value="{{ \Carbon\Carbon::parse($game->date)->format('Y-m-d') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Game</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
