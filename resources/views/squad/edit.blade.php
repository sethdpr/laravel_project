@extends('layouts.app')

@section('content')
<style>
    .card {
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
    }
    .card-header {
        background-color: #d32f2f;
        color: white;
        font-size: 1.25rem;
        font-weight: 500;
    }
    .card-body {
        padding: 1.25rem;
        background-color: #ffffff;
    }
    .form-control {
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
    }
    .btn-primary {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #fff;
    }
    .btn {
        border-radius: 0.25rem;
        padding: 0.5rem 1rem;
        font-size: 1rem;
    }
    .invalid-feedback {
        display: block;
        font-size: 0.875rem;
        color: #dc3545; /* Rode tekst voor foutmeldingen */
    }
    .form-group {
        margin-bottom: 1rem;
    }
    .form-group label {
        margin-bottom: 0.5rem;
        font-weight: 600;
    }
    .container {
        max-width: 960px;
    }
    .row {
        margin-left: 0;
        margin-right: 0;
    }
    .ml-2 {
        margin-left: 0.5rem;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Player') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('players.update', $player->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $player->name) }}" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="position">{{ __('Position') }}</label>
                            <select id="position" class="form-control @error('position') is-invalid @enderror" name="position" required>
                                <option value="Goalkeeper" {{ $player->position == 'Goalkeeper' ? 'selected' : '' }}>{{ __('Goalkeeper') }}</option>
                                <option value="Centre-back" {{ $player->position == 'Centre-back' ? 'selected' : '' }}>{{ __('Centre-back') }}</option>
                                <option value="Left-back" {{ $player->position == 'Left-back' ? 'selected' : '' }}>{{ __('Left-back') }}</option>
                                <option value="Right-back" {{ $player->position == 'Right-back' ? 'selected' : '' }}>{{ __('Right-back') }}</option>
                                <option value="Defensive midfielder" {{ $player->position == 'Defensive midfielder' ? 'selected' : '' }}>{{ __('Defensive midfielder') }}</option>
                                <option value="Central midfielder" {{ $player->position == 'Central midfielder' ? 'selected' : '' }}>{{ __('Central midfielder') }}</option>
                                <option value="Attacking midfielder" {{ $player->position == 'Attacking midfielder' ? 'selected' : '' }}>{{ __('Attacking midfielder') }}</option>
                                <option value="Left-wing" {{ $player->position == 'Left-wing' ? 'selected' : '' }}>{{ __('Left-wing') }}</option>
                                <option value="Right-wing" {{ $player->position == 'Right-wing' ? 'selected' : '' }}>{{ __('Right-wing') }}</option>
                                <option value="Striker" {{ $player->position == 'Striker' ? 'selected' : '' }}>{{ __('Striker') }}</option>
                            </select>

                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nation">{{ __('Nationality') }}</label>
                            <input id="nation" type="text" class="form-control @error('nation') is-invalid @enderror" name="nation" value="{{ old('nation', $player->nation) }}" required>

                            @error('nation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="age">{{ __('Age') }}</label>
                            <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age', $player->age) }}" required>

                            @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">{{ __('Player Image') }}</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Player') }}
                            </button>
                            <a href="{{ route('squad') }}" class="btn btn-secondary ml-2">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
