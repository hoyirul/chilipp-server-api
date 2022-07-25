<?php

namespace App\Http\Controllers;

use App\Models\Estimation;
use App\Models\News;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('pages.home.index');
    }

    public function news(){
        $estimations = Estimation::with('user')->orderBy('id', 'DESC')->get();
        $news = News::with('user')->orderBy('id', 'DESC')->get();
        return view('pages.news.index', compact('news', 'estimations'));
    }
}
