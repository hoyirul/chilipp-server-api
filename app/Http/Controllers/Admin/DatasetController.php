<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dataset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $now = Carbon::now();
        return view('admin.datasets.create', compact('dataset', 'title', 'now'));
    }

    public function store(Request $request){
        $request->validate([
            'permintaan' => 'required',
            'ketersediaan' => 'required',
            'harga' => 'required'
        ]);

        Dataset::create([
            'user_id' => Auth::user()->id,
            'tanggal' => Carbon::now(),
            'permintaan' => $request->permintaan,
            'ketersediaan' => $request->ketersediaan,
            'harga' => $request->harga,
        ]);
        
        return redirect('/u/dataset/create')->with('success', "Data berhasil ditambahkan");
    }

    public function edit($id){
        $title = 'Dataset';
        $dataset = Dataset::with('user')->get();
        return view('admin.datasets.edit', compact('dataset', 'title'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'permintaan' => 'required',
            'ketersediaan' => 'required',
            'harga' => 'required'
        ]);

        Dataset::where('id', $id)->update([
            'user_id' => Auth::user()->id,
            'tanggal' => Carbon::now(),
            'permintaan' => $request->permintaan,
            'ketersediaan' => $request->ketersediaan,
            'harga' => $request->harga,
        ]);
        
        return redirect('/u/dataset')->with('success', "Data berhasil ditambahkan");
    }
}
