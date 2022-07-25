<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estimation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstimationController extends Controller
{
    public function index()
    {
        $title = 'Estimasi Pengiriman';
        $estimations = Estimation::with('user')->get();
        return view('admin.estimations.index', compact('estimations', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Estimasi Pengiriman';
        return view('admin.estimations.create', compact('title'));
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
            'provinsi' => 'required',
            'estimasi' => 'required'
        ]);

        Estimation::create([
            'user_id' => Auth::user()->id,
            'provinsi' => $request->provinsi,
            'estimasi' => $request->estimasi,
        ]);
        
        return redirect('/u/estimations')->with('success', "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Estimasi Pengiriman';
        $estimations = Estimation::where('id', $id)->first();
        return view('admin.estimations.show', compact('title', 'estimations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Estimasi Pengiriman';
        $estimations = Estimation::where('id', $id)->first();
        return view('admin.estimations.edit', compact('title', 'estimations'));
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
            'provinsi' => 'required',
            'estimasi' => 'required'
        ]);

        Estimation::where('id', $id)->update([
            'user_id' => Auth::user()->id,
            'provinsi' => $request->provinsi,
            'estimasi' => $request->estimasi,
        ]);
        
        return redirect('/u/estimations')->with('success', "Data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Estimation::where('id', $id)->delete();
        return redirect('/u/estimations')->with('success', "Data berhasil dihapus");
    }
}
