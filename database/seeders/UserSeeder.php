<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'pimpinan',
                'username' => 'pimpinan',
                'password' => Hash::make('pimpinan'),
                'role' => 'pimpinan',
            ],
            [
                'nama' => 'admin',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ],
            [
                'nama' => 'gudang',
                'username' => 'gudang',
                'password' => Hash::make('gudang'),
                'role' => 'gudang',
            ],
            [
                'nama' => 'pelanggan',
                'username' => 'pelanggan',
                'password' => Hash::make('pelanggan'),
                'role' => 'pelanggan',
            ],
        ]);
    }
}
