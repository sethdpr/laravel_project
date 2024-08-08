<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function calendar()
    {
        $games = Game::where('date', '>=', now())->orderBy('date', 'asc')->get();

        return view('calendar', compact('games'));
    }
}
