<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dataset;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    public function index(){
        // $json = Dataset::where('tanggal', '>=','2021-08-01')->where('tanggal', '<=','2021-08-30')->get();
        $except = Dataset::orderBy('id', 'DESC')->first();
        $json = Dataset::where('id', '!=', $except->id)->get();
        return response()->json([
            $json
        ], 200);
    }

    public function sort_permintaan($berita){
        $power = Dataset::selectRaw('DISTINCT permintaan')->where('berita', $berita)->get();
        $except = Dataset::orderBy('id', 'DESC')->first();
        $permintaan = Dataset::selectRaw('COUNT(DISTINCT permintaan) as count_data, SUM(DISTINCT permintaan) as sum_data')->where('berita', $berita)->where('id', '!=', $except->id)->first();

        $count = $permintaan->count_data;
        $sum = $permintaan->sum_data;

        $sum_power = 0;
        $count_power = 0;
        $mean = $sum / $count;
        foreach($power as $row){
            $sum_power += pow($row->permintaan - $mean, 2);
            $count_power++;
        }

        $data = [
            'total' => $sum,
            'count' => $count,
            'total_pangkat_2' => $sum_power,
            'count_pangkat_2' => $count_power,
            'mean' => $mean,
            'stdev' => sqrt($sum_power/(($count_power)-1)),
            'berita' => 'permintaan ('.$berita.')'
        ];

        return response()->json($data, 200);
    }

    public function sort_ketersediaan($berita){
        $power = Dataset::selectRaw('DISTINCT ketersediaan')->where('berita', $berita)->get();
        $except = Dataset::orderBy('id', 'DESC')->first();
        $ketersediaan = Dataset::selectRaw('COUNT(DISTINCT ketersediaan) as count_data, SUM(DISTINCT ketersediaan) as sum_data')->where('berita', $berita)->where('id', '!=', $except->id)->first();

        $count = $ketersediaan->count_data;
        $sum = $ketersediaan->sum_data;

        $sum_power = 0;
        $count_power = 0;
        $mean = $sum / $count;
        foreach($power as $row){
            $sum_power += pow($row->ketersediaan - $mean, 2);
            $count_power++;
        }

        $data = [
            'total' => $sum,
            'count' => $count,
            'total_pangkat_2' => $sum_power,
            'count_pangkat_2' => $count_power,
            'mean' => $mean,
            'stdev' => sqrt($sum_power/(($count_power)-1)),
            'berita' => 'ketersediaan ('.$berita.')'
        ];

        return response()->json($data, 200);
    }

    public function sort_harga($berita){
        $power = Dataset::selectRaw('DISTINCT harga')->where('berita', $berita)->get();
        $except = Dataset::orderBy('id', 'DESC')->first();
        $harga = Dataset::selectRaw('COUNT(DISTINCT harga) as count_data, SUM(DISTINCT harga) as sum_data')->where('berita', $berita)->where('id', '!=', $except->id)->first();

        $count = $harga->count_data;
        $sum = $harga->sum_data;

        $sum_power = 0;
        $count_power = 0;
        $mean = $sum / $count;
        foreach($power as $row){
            $sum_power += pow($row->harga - $mean, 2);
            $count_power++;
        }

        $data = [
            'total' => $sum,
            'count' => $count,
            'total_pangkat_2' => $sum_power,
            'count_pangkat_2' => $count_power,
            'mean' => $mean,
            'stdev' => sqrt($sum_power/(($count_power)-1)),
            'berita' => 'harga ('.$berita.')'
        ];

        return response()->json($data, 200);
    }

    public function probabilitas_kelas(){
        $naik = Dataset::where('berita', 'naik')->count();
        $tetap = Dataset::where('berita', 'tetap')->count();
        $turun = Dataset::where('berita', 'turun')->count();
        $counta = Dataset::count();

        $data = [
            'naik' => ($naik/$counta),
            'tetap' => ($tetap/$counta),
            'turun' => ($turun/$counta),
        ];

        return response()->json($data, 200);
    }

    public function sampel_data(){
        $row = Dataset::orderBy('id', 'DESC')->first();
        $json = [
            'id' => $row->id,
            'user_id' => $row->user_id,
            'tanggal' => $row->tanggal,
            'permintaan' => $row->permintaan,
            'ketersediaan' => $row->ketersediaan,
            'harga' => $row->harga,
            'berita' => $row->berita,
        ];

        return response()->json($json, 200);
    }

    public function update(Request $request, $id){
        // dd('ok');
        $request->validate([
            'berita' => 'required'
        ]);

        $json = Dataset::where('id', $id)->update($request->all());
        
        return response()->json(['status' => 'success'], 200);
    }
}
