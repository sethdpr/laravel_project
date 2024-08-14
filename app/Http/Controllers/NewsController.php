<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(){
        $news = News::latest()->get();
        return view('home', compact('news'));
    }
    
    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:1',
            'news' => 'required|string|min:1',
        ]);

        News::create($validated);

        return redirect()->route('home')->with('status', 'Post added');
    }
        
    public function edit($id)
    {
        $newsArticle = News::findOrFail($id);
        return view('news.edit', compact('newsArticle'));
    }

    public function update($id, Request $request)
    {
        $newsArticle = News::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|min:1',
            'news' => 'required|string|min:1',
        ]);

        $newsArticle->update($validated);

        return redirect()->route('home')->with('status', 'Post updated');
    }
    
    public function destroy($id)
    {
        $newsArticle = News::findOrFail($id);
        $newsArticle->delete();
    
        return redirect()->route('home')->with('status', 'Post deleted successfully');
    }
}
