@extends('layouts.app')

@section('content')
<style>
    .legends-section {
        margin-bottom: 30px;
    }

    .legends-section h2 {
        font-size: 1.5rem;
        color: #d32f2f;
        border-bottom: 2px solid #d32f2f;
        padding-bottom: 5px;
        margin-bottom: 30px;
    }

    .legend-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .legend-card {
        position: relative;
        width: 100%;
        max-width: 200px;
        height: 250px;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-size: cover;
        background-position: center;
        transition: transform 0.3s ease;
    }

    .legend-card:hover {
        transform: translateY(-5px);
    }

    .legend-card .legend-name {
        position: absolute;
        bottom: 10px;
        left: 10px;
        color: white;
        font-size: 1.2rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    .legend-card .legend-details {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(211, 47, 47, 0.9);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-size: 1.1rem;
        padding: 10px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .legend-card:hover .legend-details {
        opacity: 1;
    }

    .btn-container {
        display: flex;
        gap: 10px;
        margin-top: -10px;
    }

    .btn {
        transition: background-color 0.3s ease;
    }

    .btn-add {
        background-color: #d32f2f;
        border-color: #d32f2f;
        color: white;
        margin-bottom: 20px;
    }
    .btn-add:hover {
        background-color: #b71c1c;
        border-color: #d32f2f;
        color: white;
    }

    .btn-edit {
        background-color: white;
        color: black;
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
    }

    .btn-edit:hover {
        background-color: #f0f0f0;
        color: black;
    }

    .btn-delete {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
    }

    .btn-delete:hover {
        background-color: #c82333;
        border-color: #c82333;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Auth::check() && Auth::user()->isAdmin())
                <div class="btn-container">
                    <a href="{{ route('legends.create') }}" class="btn btn-add">
                        Add Legend
                    </a>
                </div>
            @endif
            
            <div class="legends-section">
                <h2>Legends</h2>
                <div class="legend-list">
                    @foreach($legends as $legend)
                        <div class="legend-card" style="background-image: url('{{ asset($legend->image_path) }}');">
                            <div class="legend-name">{{ $legend->name }}</div>
                            <div class="legend-details">
                                <p>Position: {{ $legend->position }}</p>
                                <p>Nationality: {{ $legend->nation }}</p>
                                <p>Age: {{ $legend->age }}</p>
                                <p>Competitive Appearances: {{ $legend->competitive_appearances }}</p>
                                <div class="btn-container">
                                    @if(Auth::check() && Auth::user()->isAdmin())
                                        <a href="{{ route('legends.edit', $legend->id) }}" class="btn btn-edit">
                                            Edit
                                        </a>
                                        <form action="{{ route('legends.destroy', $legend->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this legend?');">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
