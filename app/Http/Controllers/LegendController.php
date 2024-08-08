<?php

namespace App\Http\Controllers;

use App\Models\Legend;
use Illuminate\Http\Request;

class LegendController extends Controller
{
    public function index()
    {
        $legends = Legend::orderBy('competitive_appearances', 'desc')->get();
        return view('legends', compact('legends'));
    }
}
