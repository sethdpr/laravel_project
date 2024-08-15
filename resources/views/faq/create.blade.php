@extends('layouts.app')

@section('content')
<style>
    .faq-section {
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .faq-section .card-header {
        background-color: #d32f2f;
        color: white;
        font-size: 1.5rem;
        border-radius: 10px 10px 0 0;
        padding: 15px;
        text-align: center;
    }

    .btn-primary {
        background-color: #d32f2f;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #b71c1c;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-label {
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    .invalid-feedback {
        color: red;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card faq-section">
                <div class="card-header">Create FAQ</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('faq.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="question" class="form-label">Question</label>
                            <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question') }}" required autofocus>
                            @error('question')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer" class="form-label">Answer</label>
                            <textarea id="answer" class="form-control @error('answer') is-invalid @enderror" name="answer" rows="5" required>{{ old('answer') }}</textarea>
                            @error('answer')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add FAQ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
