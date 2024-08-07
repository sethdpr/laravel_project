<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class SquadController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('squad', compact('players'));
    }
}