<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Dataset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function auth(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $json = User::where('email', $credentials['email'])->first();
            return response()->json($json, 200);
        }
 
        return response()->json(['status' => 'failed load data!'], 400);
    }

    public function register(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return response()->json(['status' => 'Data saved successfully!'], 200);
    }

    public function index(){
        $json = User::all();
        return response()->json([
            $json
        ], 200);
    }

    public function show($id){
        $json = User::where('id', $id)->first();
        return response()->json($json, 200);
    }

    public function stop_loss(Request $request, $id){
        $request->validate([
            'stop_loss' => 'required',
        ]);
        
        $dataset = Dataset::orderBy('id', 'DESC')->first();
        
        User::where('id', $id)->update([
            'stop_loss' => $request->stop_loss,
            'harga_awal' => $dataset->harga,
        ]);
    }
}
