@extends('layouts.app')

@section('content')
<style>
    .contact-section {
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .contact-section .card-header {
        background-color: #d32f2f;
        color: white;
        font-size: 1.5rem;
        border-radius: 10px 10px 0 0;
        padding: 15px;
        text-align: center;
    }

    .contact-section .card-body {
        padding: 30px;
    }

    .contact-section .form-group label {
        font-size: 1.1rem;
        color: #333;
    }

    .contact-section .form-group input,
    .contact-section .form-group textarea {
        border-radius: 5px;
        border: 1px solid #d32f2f;
        font-size: 1rem;
        padding: 10px;
    }

    .contact-section .form-group input:focus,
    .contact-section .form-group textarea:focus {
        border-color: #b71c1c;
        box-shadow: 0 0 5px rgba(211, 47, 47, 0.5);
    }

    .contact-section .btn-primary {
        background-color: #d32f2f;
        border: none;
        font-size: 1rem;
        padding: 10px 20px;
        margin-top: 10px;
        transition: background-color 0.3s ease;
    }

    .contact-section .btn-primary:hover {
        background-color: #b71c1c;
    }

    .alert-success {
        background-color: #4caf50;
        color: white;
        border-radius: 5px;
        padding: 15px;
        text-align: center;
        font-size: 1.1rem;
    }

    .form-control {
        resize: none;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card contact-section">
                <div class="card-header">Contact Us</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Your Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Your Message:</label>
                            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection