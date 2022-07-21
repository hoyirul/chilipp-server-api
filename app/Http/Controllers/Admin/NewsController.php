<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'News / Berita';
        $news = News::with('user')->get();
        return view('admin.news.index', compact('news', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'News / Berita';
        return view('admin.news.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ketersediaan' => 'required',
            'harga' => 'required'
        ]);

        News::create([
            'user_id' => Auth::user()->id,
            'tanggal' => Carbon::now(),
            'ketersediaan' => $request->ketersediaan,
            'harga' => $request->harga,
        ]);
        
        return redirect('/u/news')->with('success', "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'News / Berita';
        $news = News::where('id', $id)->first();
        return view('admin.news.show', compact('title', 'news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'News / Berita';
        $news = News::where('id', $id)->first();
        return view('admin.news.edit', compact('title', 'news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ketersediaan' => 'required',
            'harga' => 'required'
        ]);

        News::where('id', $id)->update([
            'user_id' => Auth::user()->id,
            'tanggal' => Carbon::now(),
            'ketersediaan' => $request->ketersediaan,
            'harga' => $request->harga,
        ]);
        
        return redirect('/u/news')->with('success', "Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::where('id', $id)->delete();
        return redirect('/u/news')->with('success', "Data berhasil dihapus");
    }
}
