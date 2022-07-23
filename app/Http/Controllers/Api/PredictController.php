<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dataset;
use Illuminate\Http\Request;
use Phpml\Regression\SVR;
use Phpml\SupportVectorMachine\Kernel;

class PredictController extends Controller
{
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

        return $data;
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

        return $data;
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

        return $data;
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

        return $data;
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

        return $json;
    }

    public function news_predict(){
        $class = new PredictController();
        
        // Probabilitas Kelas
        $prob = $class->probabilitas_kelas();
        

        // Permintaan (x = naik, y = tetap, z = turun)
        $permintaan_x = $class->sort_permintaan('naik');
        $permintaan_y = $class->sort_permintaan('tetap');
        $permintaan_z = $class->sort_permintaan('turun');

        // Ketersediaan (x = naik, y = tetap, z = turun)
        $ketersediaan_x = $class->sort_ketersediaan('naik');
        $ketersediaan_y = $class->sort_ketersediaan('tetap');
        $ketersediaan_z = $class->sort_ketersediaan('turun');

        // Harga (x = naik, y = tetap, z = turun)
        $harga_x = $class->sort_harga('naik');
        $harga_y = $class->sort_harga('tetap');
        $harga_z = $class->sort_harga('turun');

        // Sampel Data
        $sampel = $class->sampel_data();
        $sampel_permintaan = $sampel['permintaan'];
        $sampel_ketersediaan = $sampel['ketersediaan'];
        $sampel_harga = $sampel['harga'];
        $berita = $sampel['berita'];

        // Probabilitas Permintaan (x = naik, y = tetap, z = turun)
        $prob_permintaan_x = 1/sqrt(2*3.14*$permintaan_x['stdev']) * exp(-(pow($sampel_permintaan-$permintaan_x['mean'], 2))/(pow($permintaan_x['stdev'], 2)));
        $prob_permintaan_y = 1/sqrt(2*3.14*$permintaan_y['stdev']) * exp(-(pow($sampel_permintaan-$permintaan_y['mean'], 2))/(pow($permintaan_y['stdev'], 2)));
        $prob_permintaan_z = 1/sqrt(2*3.14*$permintaan_z['stdev']) * exp(-(pow($sampel_permintaan-$permintaan_z['mean'], 2))/(pow($permintaan_z['stdev'], 2)));

        // Probabilitas Ketersediaan (x = naik, y = tetap, z = turun)
        $prob_ketersediaan_x = 1/sqrt(2*3.14*$ketersediaan_x['stdev']) * exp(-(pow($sampel_ketersediaan-$ketersediaan_x['mean'], 2))/(pow($ketersediaan_x['stdev'], 2)));
        $prob_ketersediaan_y = 1/sqrt(2*3.14*$ketersediaan_y['stdev']) * exp(-(pow($sampel_ketersediaan-$ketersediaan_y['mean'], 2))/(pow($ketersediaan_y['stdev'], 2)));
        $prob_ketersediaan_z = 1/sqrt(2*3.14*$ketersediaan_z['stdev']) * exp(-(pow($sampel_ketersediaan-$ketersediaan_z['mean'], 2))/(pow($ketersediaan_z['stdev'], 2)));

        // Probabilitas Harga (x = naik, y = tetap, z = turun)
        $prob_harga_x = 1/sqrt(2*3.14*$harga_x['stdev']) * exp(-(pow($sampel_harga-$harga_x['mean'], 2))/(pow($harga_x['stdev'], 2)));
        $prob_harga_y = 1/sqrt(2*3.14*$harga_y['stdev']) * exp(-(pow($sampel_harga-$harga_y['mean'], 2))/(pow($harga_y['stdev'], 2)));
        $prob_harga_z = 1/sqrt(2*3.14*$harga_z['stdev']) * exp(-(pow($sampel_harga-$harga_z['mean'], 2))/(pow($harga_z['stdev'], 2)));

        // Klasifikasi
        $klasifikasi_x = $prob_permintaan_x * $prob_ketersediaan_x * $prob['naik'] * $prob_harga_x;
        $klasifikasi_y = $prob_permintaan_y * $prob_ketersediaan_y * $prob['tetap'] * $prob_harga_y;
        $klasifikasi_z = $prob_permintaan_z * $prob_ketersediaan_z * $prob['naik'] * $prob_harga_z;

        if($klasifikasi_x > $klasifikasi_y && $klasifikasi_x > $klasifikasi_z){
            $berita = 'naik';
        }elseif($klasifikasi_y > $klasifikasi_x && $klasifikasi_y > $klasifikasi_z){
            $berita = 'tetap';
        }elseif($klasifikasi_z > $klasifikasi_x && $klasifikasi_z > $klasifikasi_y){
            $berita = 'turun';
        }

        $row = Dataset::orderBy('id', 'DESC')->first();
        Dataset::where('id', $row->id)->update(['berita' => $berita]);
        
        $json = [
            'berita' => $berita
        ];

        return response()->json($json, 200);
    }

    public function get_data(){
        $except = Dataset::orderBy('id', 'DESC')->first();
        $json = Dataset::where('id', '!=', $except->id)->get();
        return $json;
    }

    public function price_predict(){
        $except = Dataset::orderBy('id', 'DESC')->first();
        $class = new PredictController();
        $dataset = $class->get_data();

        $price = [];
        $id = [];
        $permintaan = [];
        foreach($dataset as $row){
            $price[] = [$row->harga];
            $permintaan[] = $row->permintaan*5;
            $id[] = $row->id;
        }

        // dd($price);

        $samples = $price;
        $targets = $permintaan;

        $regression = new SVR(Kernel::RBF);
        $regression->train($samples, $targets);
        
        return response()->json(['harga' => $regression->predict([$except->harga])], 200);

    }
}
