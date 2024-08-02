@extends('layouts.app')

@section('content')
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
                        hier komt de detail van een nieuwsartikel <br>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
