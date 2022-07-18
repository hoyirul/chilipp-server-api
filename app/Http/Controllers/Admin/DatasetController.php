<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dataset;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    public function index(){
        $title = 'Dataset';
        $dataset = Dataset::with('user')->get();
        return view('admin.datasets.index', compact('dataset', 'title'));
    }

    public function create(){
        $title = 'Dataset';
        $dataset = Dataset::with('user')->get();
        return view('admin.datasets.index', compact('dataset', 'title'));
    }

    public function store(Request $request){
        $request->validate([
            'user_id' => 'required',
            'tanggal' => 'required',
            'permintaan' => 'required',
            'ketersediaan' => 'required',
            'harga' => 'required'
        ]);

        Dataset::create([
            'user_id' => $request->user_id,
            'tanggal' => $request->tanggal,
            'permintaan' => $request->permintaan,
            'ketersediaan' => $request->ketersediaan,
            'harga' => $request->harga,
        ]);
        
        return redirect('/u/author')->with('success', "Data berhasil ditambahkan");
    }

    public function edit($id){
        $title = 'Dataset';
        $dataset = Dataset::with('user')->get();
        return view('admin.datasets.index', compact('dataset', 'title'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'user_id' => 'required',
            'tanggal' => 'required',
            'permintaan' => 'required',
            'ketersediaan' => 'required',
            'harga' => 'required'
        ]);

        Dataset::where('id', $id)->update([
            'user_id' => $request->user_id,
            'tanggal' => $request->tanggal,
            'permintaan' => $request->permintaan,
            'ketersediaan' => $request->ketersediaan,
            'harga' => $request->harga,
        ]);
        
        return redirect('/u/author')->with('success', "Data berhasil ditambahkan");
    }
}
