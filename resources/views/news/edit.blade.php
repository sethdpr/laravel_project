@extends('layouts.app')

@section('content')
<style>
    .card-header {
        background-color: #d32f2f;
        color: white;
        font-size: 1.5rem;
        border-radius: 10px 10px 0 0;
        text-align: center;
        padding: 15px;
    }

    .card-body {
        background-color: #f7f7f7;
        padding: 30px;
        border-radius: 0 0 10px 10px;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 1rem;
    }

    .form-control:focus {
        border-color: #d32f2f;
        box-shadow: 0 0 5px rgba(211, 47, 47, 0.5);
    }

    .btn-primary {
        background-color: #d32f2f;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        color: white;
    }

    .btn-primary:hover {
        background-color: #b71c1c;
    }

    .invalid-feedback {
        font-size: 0.9rem;
        color: #d32f2f;
    }

    textarea {
        width: 100%;
        height: 150px;
        border-radius: 5px;
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ccc;
        resize: vertical;
    }

    textarea:focus {
        border-color: #d32f2f;
        box-shadow: 0 0 5px rgba(211, 47, 47, 0.5);
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('news.update', $newsArticle->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $newsArticle->title }}" required autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="news" class="col-md-4 col-form-label text-md-end">News</label>

                            <div class="col-md-6">
                                <textarea id="news" class="form-control @error('news') is-invalid @enderror" name="news" required>{{ $newsArticle->news }}</textarea>

                                @error('news')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
