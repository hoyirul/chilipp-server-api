<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'Admin',
            'email' => 'admin'.'@chilipp.com',
            'alamat' => 'Malang',
            'role' => 'admin',
            'password' => Hash::make('admin'),
        ]);
        DB::table('users')->insert([
            'nama' => 'Pasar Pusat',
            'email' => 'pasar'.'@chilipp.com',
            'alamat' => 'Jakarta Pusat',
            'role' => 'pasar',
            'password' => Hash::make('pasar'),
        ]);
        DB::table('users')->insert([
            'nama' => 'Pengepul1',
            'email' => 'pengepul'.'@chilipp.com',
            'alamat' => 'Bondowoso',
            'role' => 'pengepul',
            'password' => Hash::make('pengepul'),
        ]);
        DB::table('users')->insert([
            'nama' => 'Petani',
            'email' => 'petani'.'@chilipp.com',
            'alamat' => 'Bondowoso',
            'role' => 'petani',
            'password' => Hash::make('petani'),
        ]);
    }
}
