<?php

namespace App\Http\Controllers;

use App\Models\Legend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LegendController extends Controller
{
    public function index()
    {
        $legends = Legend::orderBy('competitive_appearances', 'desc')->get();
        return view('legends', compact('legends'));
    }

    public function create()
    {
        return view('legends.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'nation' => 'required|string|max:255',
            'age' => 'required|integer',
            'competitive_appearances' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $legend = new Legend();
        $legend->name = $request->input('name');
        $legend->position = $request->input('position');
        $legend->nation = $request->input('nation');
        $legend->age = $request->input('age');
        $legend->competitive_appearances = $request->input('competitive_appearances');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $path = $image->storeAs('images/legends', $filename, 'public');
            $legend->image_path = $path;
        }

        $legend->save();
        return redirect()->route('legends');
    }

    public function edit(Legend $legend)
    {
        return view('legends.edit', compact('legend'));
    }

    public function update(Request $request, Legend $legend)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'nation' => 'required|string|max:255',
            'age' => 'required|integer',
            'competitive_appearances' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $legend->name = $request->input('name');
        $legend->position = $request->input('position');
        $legend->nation = $request->input('nation');
        $legend->age = $request->input('age');
        $legend->competitive_appearances = $request->input('competitive_appearances');

        if ($request->hasFile('image')) {
            if ($legend->image_path) {
                Storage::disk('public')->delete($legend->image_path);
            }

            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $path = $image->storeAs('images/legends', $filename, 'public');
            $legend->image_path = $path;
        }

        $legend->save();
        return redirect()->route('legends');
    }

    public function destroy(Legend $legend)
    {
        if ($legend->image_path) {
            Storage::disk('public')->delete($legend->image_path);
        }

        $legend->delete();
        return redirect()->route('legends');
    }
}
