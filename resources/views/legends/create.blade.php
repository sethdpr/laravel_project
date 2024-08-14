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

    .form-group label {
        font-weight: bold;
        color: #d32f2f;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .btn-primary {
        background-color: #d32f2f;
        border-color: #d32f2f;
        margin-top: 10px;
    }

    .btn-primary:hover {
        background-color: #b71c1c;
        border-color: #b71c1c;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card form-section">
                <div class="card-header">{{ __('Add Legend') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('legends.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="position">{{ __('Position') }}</label>
                            <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required>
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nation">{{ __('Nation') }}</label>
                            <input id="nation" type="text" class="form-control @error('nation') is-invalid @enderror" name="nation" value="{{ old('nation') }}" required>
                            @error('nation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="age">{{ __('Age') }}</label>
                            <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required>
                            @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="competitive_appearances">{{ __('Competitive Appearances') }}</label>
                            <input id="competitive_appearances" type="number" class="form-control @error('competitive_appearances') is-invalid @enderror" name="competitive_appearances" value="{{ old('competitive_appearances') }}" required>
                            @error('competitive_appearances')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">{{ __('Image') }}</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add Legend') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
