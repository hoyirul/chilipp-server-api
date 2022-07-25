<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estimation;
use Illuminate\Http\Request;

class EstimationController extends Controller
{
    public function index(){
        $json = Estimation::with('user')->get();
        return response()->json([$json], 200);
    }
}
