<?php

namespace App\Http\Controllers;

use App\Models\Legend;
use Illuminate\Http\Request;

class LegendController extends Controller
{
    public function index()
    {
        $legends = Legend::all();
        return view('legends', compact('legends'));
    }
}
