<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $news = News::latest()->get();
        return view('home', compact('news'));
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
