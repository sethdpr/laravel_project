@extends('layouts.app')

@section('content')
<style>
    .creationDate{
        font-size: 80%;
        color: gray;
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
                        <h3>{{ $newArticle->title }}</h3>
                        <p>{{ $newArticle->news }}</p>
                        <hr>
                        <p class="creationDate">{{ $newArticle->created_at->format('d/m/Y') }}</p>
                        @if(Auth::user())
                            @if(Auth::user()->is_admin == true)
                                <a href="{{ route('news.edit', $newArticle->id) }}">Edit post</a>
                                Delete link
                            @endif
                        @endif        
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
