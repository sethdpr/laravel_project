@extends('layouts.app')

@section('content')
<style>
    .creationDate {
        font-size: 80%;
        color: gray;
    }

    .btn-edit {
        background-color: orange;
        color: black;
        border: none;
        padding: 0.4rem 0.65rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        text-align: center;
        display: inline-block;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-edit:hover {
        background-color: darkorange; /* Hover kleur voor de Edit-knop */
    }

    .btn-danger {
        background-color: red;
        color: white;
        border: none;
        padding: 0.4rem 0.65rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        text-align: center;
        display: inline-block;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-danger:hover {
        background-color: darkred; /* Hover kleur voor de Delete-knop */
    }

    .article-container {
        display: flex;
        align-items: flex-start; /* Uitlijning aan de bovenkant */
        justify-content: space-between;
        margin-bottom: 15px; /* Ruimte onder elk artikel */
    }

    .article-content {
        flex: 1; /* Zorgt ervoor dat de inhoud de beschikbare ruimte opvult */
    }

    .actions {
        display: flex;
        flex-direction: column; /* Zorgt ervoor dat de knoppen onder elkaar staan */
        gap: 10px; /* Ruimte tussen knoppen */
        align-items: flex-end; /* Uitlijning van knoppen aan de rechterkant */
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
    </div>
</div>
@endsection
