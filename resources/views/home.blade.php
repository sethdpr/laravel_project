@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Nunito', sans-serif;
    }

    .container {
        width: 100%;
        padding: 0 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .card-header {
        background-color: #d32f2f;
        color: white;
        font-weight: bold;
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
        display: inline-block;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #b71c1c;
    }

    .list-group-item {
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 10px;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .list-group-item:hover {
        background-color: #f1f1f1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .list-group-item h5 {
        margin: 0;
        font-size: 1.5rem;
        color: #d32f2f;
    }

    .list-group-item p {
        margin: 5px 0;
        color: #333;
        overflow-wrap: break-word;
    }

    .list-group-item small {
        color: gray;
        font-size: 0.9rem;
    }

    .btn-edit, .btn-delete {
        background-color: white;
        color: #333;
        border: 1px solid #ddd;
        padding: 5px 10px;
        font-size: 0.9rem;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-edit {
        background-color: #f0f0f0;
    }

    .btn-edit:hover {
        background-color: #e0e0e0;
    }

    .btn-delete {
        background-color: #d32f2f;
        color: white;
        border-color: #d32f2f;
    }

    .btn-delete:hover {
        background-color: #b71c1c;
    }

    .actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        @if(auth()->user()->isAdmin())
                            <div class="mb-3 text-center">
                                <a href="{{ route('news.create') }}" class="btn btn-primary">
                                    Add Post
                                </a>
                            </div>
                        @endif
                    @endauth

                    @if($news->isEmpty())
                        <p class="text-center">No posts available.</p>
                    @else
                        <div class="list-group">
                            @foreach($news as $newsArticle)
                                <div class="list-group-item">
                                    <div>
                                        <h5 class="mb-1">{{ $newsArticle->title }}</h5>
                                        <p class="mb-1">{{ $newsArticle->news }}</p>
                                        <small>{{ $newsArticle->created_at->format('d-m-Y') }}</small>
                                    </div>
                                    @auth
                                        @if(auth()->user()->isAdmin())
                                            <div class="actions">
                                                <a href="{{ route('news.edit', $newsArticle->id) }}" class="btn-edit">
                                                    Edit
                                                </a>
                                                <form action="{{ route('news.destroy', $newsArticle->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-delete">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.btn-delete');

        deleteForms.forEach(form => {
            form.addEventListener('click', function (e) {
                if (!confirm('Are you sure you want to delete this post?')) {
                    e.preventDefault();
                }
            });
        });
    });
</script>
@endsection
