<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SquadController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('squad', compact('players'));
    }

    public function create()
    {
        return view('squad.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'nation' => 'required|string|max:255',
            'age' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $player = new Player();
        $player->name = $request->input('name');
        $player->position = $request->input('position');
        $player->nation = $request->input('nation');
        $player->age = $request->input('age');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
            $path = $image->storeAs('images/players', $originalName, 'public');
            $player->image_path = $path;
        }

        $player->save();
        return redirect()->route('squad');
    }

    public function edit(Player $player)
    {
        return view('squad.edit', compact('player'));
    }

    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'nation' => 'required|string|max:255',
            'age' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $player->name = $request->input('name');
        $player->position = $request->input('position');
        $player->nation = $request->input('nation');
        $player->age = $request->input('age');

        if ($request->hasFile('image')) {
            if ($player->image_path) {
                Storage::disk('public')->delete($player->image_path);
            }
        
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
            $path = $image->storeAs('images/players', $originalName, 'public');
            $player->image_path = $path;
        }

        $player->save();
        return redirect()->route('squad');
    }

    public function destroy(Player $player)
    {
        if ($player->image_path) {
            Storage::disk('public')->delete($player->image_path);
        }
        
        $player->delete();
        return redirect()->route('squad');
    }
}