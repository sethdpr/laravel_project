@extends('layouts.app')

@section('content')
<style>
    /* Algemene stijl voor de form card */
    .form-card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .form-card-header {
        background-color: #d32f2f; /* Rode kleur voor de header */
        color: white;
        font-size: 1.25rem;
        padding: 15px;
    }

    .form-card-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        font-size: 1.1rem;
        color: #333;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .form-control:focus {
        border-color: #d32f2f;
        box-shadow: 0 0 0 0.2rem rgba(211, 47, 47, 0.25);
    }

    .btn-primary {
        background-color: #d32f2f;
        border-color: #d32f2f;
        color: white;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #b71c1c;
        border-color: #b71c1c;
    }

    .invalid-feedback {
        font-size: 0.875rem;
        color: #e74c3c;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card form-card">
                <div class="card-header form-card-header">{{ __('Add Player') }}</div>

                <div class="card-body form-card-body">
                    <form method="POST" action="{{ route('players.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="position">{{ __('Position') }}</label>
                            <select id="position" class="form-control @error('position') is-invalid @enderror" name="position" required>
                                <option value="Goalkeeper">{{ __('Goalkeeper') }}</option>
                                <option value="Centre-back">{{ __('Centre-back') }}</option>
                                <option value="Left-back">{{ __('Left-back') }}</option>
                                <option value="Right-back">{{ __('Right-back') }}</option>
                                <option value="Defensive midfielder">{{ __('Defensive midfielder') }}</option>
                                <option value="Central midfielder">{{ __('Central midfielder') }}</option>
                                <option value="Attacking midfielder">{{ __('Attacking midfielder') }}</option>
                                <option value="Left-wing">{{ __('Left-wing') }}</option>
                                <option value="Right-wing">{{ __('Right-wing') }}</option>
                                <option value="Striker">{{ __('Striker') }}</option>
                            </select>

                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nation">{{ __('Nationality') }}</label>
                            <input id="nation" type="text" class="form-control @error('nation') is-invalid @enderror" name="nation" value="{{ old('nation') }}" required>

                            @error('nation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="age">{{ __('Age') }}</label>
                            <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required>

                            @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">{{ __('Player Image') }}</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add Player') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
