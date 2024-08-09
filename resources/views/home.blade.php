@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f8f9fa; /* Lichte achtergrondkleur voor contrast */
        font-family: 'Nunito', sans-serif; /* Modern lettertype */
    }

    .container {
        width: 100%;
        padding: 0 20px;
        max-width: 1200px; /* Maximale breedte */
        margin: 0 auto; /* Center de container */
    }

    .card-header {
        background-color: #d32f2f; /* Manchester United rode kleur */
        color: white;
        font-weight: bold;
        text-align: center;
    }

    .creationDate {
        font-size: 80%;
        color: gray;
    }

    .btn-edit {
        background-color: #ffcc00; /* Gele kleur passend bij het tweede logo */
        color: black;
        border: none;
        padding: 0.6rem 1rem;
        font-size: 1.2rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        text-align: center;
        display: inline-block;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-edit:hover {
        background-color: #ff9900; /* Donkerdere tint geel voor hover */
    }

    .btn-danger {
        background-color: #d32f2f; /* Manchester United rode kleur */
        color: white;
        border: none;
        padding: 0.6rem 1rem;
        font-size: 1.2rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        text-align: center;
        display: inline-block;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-danger:hover {
        background-color: #b71c1c; /* Donkerdere tint rood voor hover */
    }

    .article-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 30px;
        background-color: white;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 5px;
        width: 100%;
    }

    .article-content {
        width: 100%;
    }

    .article-content h3 {
        color: #d32f2f; /* Rode kleur voor titels */
        font-size: 2rem; /* Grotere titel */
        margin-bottom: 15px;
    }

    .article-content p {
        color: #333;
        font-size: 1.1rem; /* Grotere tekst */
        margin-bottom: 15px;
    }

    .actions {
        display: flex;
        justify-content: flex-end;
        width: 100%;
        gap: 15px;
    }

    hr {
        border: 1px solid #ddd;
        width: 100%;
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-header">Home</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @foreach($news as $newArticle)
                <div class="article-container">
                    <div class="article-content">
                        <h3>{{ $newArticle->title }}</h3>
                        <p>{{ $newArticle->news }}</p>
                        <p class="creationDate">{{ $newArticle->created_at->format('d/m/Y') }}</p>
                    </div>

                    @if(Auth::user() && Auth::user()->is_admin)
                        <div class="actions">
                            <form action="{{ route('news.edit', $newArticle->id) }}" method="GET">
                                <button type="submit" class="btn btn-edit">Edit post</button>
                            </form>

                            <form action="{{ route('news.destroy', $newArticle->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
                <hr>
            @endforeach 
        </div>
    </div>
</div>
@endsection
