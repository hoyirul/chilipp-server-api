<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        $title = 'Dashboard';
        $user = User::where('id', Auth::user()->id)
                    ->first();
        return view('admin.home.index', compact([
            'title', 'user'
        ]));
    }

    public function update_profile(Request $request){
        // ddd($request->all());
        $request->validate([
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string',
        ]);

        User::where('id', auth()->user()->id)
            ->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ]);
        
        return redirect()->back()
                         ->with('success', 'Profile successfully changed at '. Carbon::now());
    }

    public function change_password(){
        $title = 'Change Password';
        $user = User::where('id', auth()->user()->id)
                        ->first();
        return view('admin.home.change_password', compact('user', 'title'));
    }

    public function update_password(Request $request){
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password|min:6'
        ]);
        
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        
        return redirect('/u/change_password')->with('success', 'Password successfully changed at '.Carbon::now());
    }
}
