<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        
        $validated = $request->validate([
            'title' => 'required|min:1',
            'news' => 'required|min:1',
        ]);

        $newArticle = new News;
        $newArticle->title = $validated['title'];
        $newArticle->news = $validated['news'];
        $newArticle->save();

        return redirect()->route('home');
    }
}
