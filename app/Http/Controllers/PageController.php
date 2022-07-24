<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('pages.home.index');
    }

    public function news(){
        $news = News::with('user')->orderBy('id', 'DESC')->get();
        return view('pages.news.index', compact('news'));
    }
}
