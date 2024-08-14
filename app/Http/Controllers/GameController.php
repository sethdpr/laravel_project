<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('calendar', compact('games'));
    }

    public function create()
    {
        return view('calendar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'opponent' => 'required|string|max:255',
            'home_away' => 'required|in:Home,Away',
            'league_cup' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        Game::create($validated);

        return redirect()->route('calendar')->with('success', 'Game added successfully.');
    }

    public function edit(Game $game)
    {
        return view('calendar.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'opponent' => 'required|string|max:255',
            'home_away' => 'required|in:Home,Away',
            'league_cup' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $game->update($validated);

        return redirect()->route('calendar')->with('success', 'Game updated successfully.');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('calendar')->with('success', 'Game deleted successfully.');
    }
}