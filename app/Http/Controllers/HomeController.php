<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller
{    
    public function index(){
        $news = News::latest()->get();
        return view('home', compact('news'));
    }
}
