@extends('layouts.app')

@section('content')
<style>
    /* Algemeen container stijl */
    .legends-section {
        margin-bottom: 30px;
    }

    /* Titels voor de sectie */
    .legends-section h2 {
        font-size: 1.5rem;
        color: #d32f2f; /* Rode kleur voor titels */
        border-bottom: 2px solid #d32f2f; /* Rode lijn onder de titel */
        padding-bottom: 5px;
        margin-bottom: 20px;
    }

    /* Container voor legende vakjes */
    .legend-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    /* Individuele legende vakjes */
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

    /* Legende naam bovenop de achtergrondafbeelding */
    .legend-card .legend-name {
        position: absolute;
        bottom: 10px;
        left: 10px;
        color: white;
        font-size: 1.2rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    /* Rode overlay met details bij hover */
    .legend-card .legend-details {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(211, 47, 47, 0.9); /* Rode overlay kleur */
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
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Legends Section -->
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
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

