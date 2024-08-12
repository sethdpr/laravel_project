@extends('layouts.app')

@section('content')
<style>
    /* Algemeen container stijl */
    .squad-section {
        margin-bottom: 30px;
    }

    /* Titels voor de posities */
    .squad-section h2 {
        font-size: 1.5rem;
        color: #d32f2f; /* Rode kleur voor titels */
        border-bottom: 2px solid #d32f2f; /* Rode lijn onder de titel */
        padding-bottom: 5px;
        margin-bottom: 20px;
    }

    /* Container voor speler vakjes */
    .player-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    /* Individuele speler vakjes */
    .player-card {
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

    .player-card:hover {
        transform: translateY(-5px);
    }

    /* Speler naam bovenop de achtergrondafbeelding */
    .player-card .player-name {
        position: absolute;
        bottom: 10px;
        left: 10px;
        color: white;
        font-size: 1.2rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    /* Rode overlay met details bij hover */
    .player-card .player-details {
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

    .player-card:hover .player-details {
        opacity: 1;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Goalkeepers Section -->
            <div class="squad-section">
                <h2>Goalkeepers</h2>
                <div class="player-list">
                    @foreach($players as $player)
                        @if($player->position === 'Goalkeeper')
                        <div class="player-card" style="background-image: url('{{ asset($player->image_path) }}');">
                                <div class="player-name">{{ $player->name }}</div>
                                <div class="player-details">
                                    <p>Position: {{ $player->position }}</p>
                                    <p>Nationality: {{ $player->nation }}</p>
                                    <p>Age: {{ $player->age }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Defenders Section -->
            <div class="squad-section">
                <h2>Defenders</h2>
                <div class="player-list">
                    @foreach($players as $player)
                        @if(in_array($player->position, ['Centre-back', 'Left-back', 'Right-back']))
                            <div class="player-card" style="background-image: url('{{ asset($player->image_path) }}');">
                                <div class="player-name">{{ $player->name }}</div>
                                <div class="player-details">
                                    <p>Position: {{ $player->position }}</p>
                                    <p>Nationality: {{ $player->nation }}</p>
                                    <p>Age: {{ $player->age }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Midfielders Section -->
            <div class="squad-section">
                <h2>Midfielders</h2>
                <div class="player-list">
                    @foreach($players as $player)
                        @if(in_array($player->position, ['Defensive midfielder', 'Central midfielder', 'Attacking midfielder']))
                            <div class="player-card" style="background-image: url('{{ asset($player->image_path) }}');">
                                <div class="player-name">{{ $player->name }}</div>
                                <div class="player-details">
                                    <p>Position: {{ $player->position }}</p>
                                    <p>Nationality: {{ $player->nation }}</p>
                                    <p>Age: {{ $player->age }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Attackers Section -->
            <div class="squad-section">
                <h2>Attackers</h2>
                <div class="player-list">
                    @foreach($players as $player)
                        @if(in_array($player->position, ['Left-wing', 'Right-wing', 'Striker']))
                            <div class="player-card" style="background-image: url('{{ asset($player->image_path) }}');">
                                <div class="player-name">{{ $player->name }}</div>
                                <div class="player-details">
                                    <p>Position: {{ $player->position }}</p>
                                    <p>Nationality: {{ $player->nation }}</p>
                                    <p>Age: {{ $player->age }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
