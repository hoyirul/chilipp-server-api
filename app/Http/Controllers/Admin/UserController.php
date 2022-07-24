<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function get_admin(){
        $title = 'Admins';
        $users = User::where('role', 'admin')->get();
        return view('admin.users.index', compact('users', 'title'));
    }

    public function get_market(){
        $title = 'Pasar';
        $users = User::where('role', 'pasar')->get();
        return view('admin.users.index', compact('users', 'title'));
    }

    public function get_collector(){
        $title = 'Pengepul';
        $users = User::where('role', 'pengepul')->get();
        return view('admin.users.index', compact('users', 'title'));
    }

    public function get_farmer(){
        $title = 'Petani';
        $users = User::where('role', 'petani')->get();
        return view('admin.users.index', compact('users', 'title'));
    }

    public function create(){
        $title = 'User Baru';
        return view('admin.users.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|min:6|same:password',
            'role' => 'required',
            'alamat' => 'required|string',
        ]);

        User::create([
            'nama' => $request->email,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'role' => $request->role,
        ]);
        
        return redirect('/u/admins')->with('success', "Data berhasil tambahkan!");
    }

    public function edit_admin($id)
    {
        // dd('oke');
        $title = 'Users';
        $users = User::where('id', $id)->first();
        return view('admin.users.edit', compact('title', 'users'));
    }

    public function update_admin(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'role' => 'required',
            'alamat' => 'required|string',
        ]);

        User::where('id', $id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'role' => $request->role,
        ]);
        
        return redirect('/u/admins')->with('success', "Data berhasil diubah");
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        User::where('id', $id)->delete();
        return redirect('/u/admins')->with('success', "Data berhasil dihapus");
    }
}
