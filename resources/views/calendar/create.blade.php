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
                <div class="card-header">Create New Game</div>

                <div class="card-body">
                    <form action="{{ route('games.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="opponent">Opponent</label>
                            <input type="text" id="opponent" name="opponent" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="home_away">Home/Away</label>
                            <select id="home_away" name="home_away" class="form-control" required>
                                <option value="Home">Home</option>
                                <option value="Away">Away</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="league_cup">League/Cup</label>
                            <input type="text" id="league_cup" name="league_cup" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Game</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
