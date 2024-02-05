<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'role' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60),
        ]);
        DB::table('services')->insert([
            // Mobil
            [
                'nama' => 'Cuci Cepat',
                'tipekendaraan' => 'Mobil',
                'harga' => '40000',
            ],
            [
                'nama' => 'Cuci Standar',
                'tipekendaraan' => 'Mobil',
                'harga' => '50000',
            ],
            [
                'nama' => 'Cuci Lengkap A',
                'tipekendaraan' => 'Mobil',
                'harga' => '70000',
            ],
            [
                'nama' => 'Cuci Lengkap B',
                'tipekendaraan' => 'Mobil',
                'harga' => '70000',
            ],
            [
                'nama' => 'Cuci Lengkap C',
                'tipekendaraan' => 'Mobil',
                'harga' => '85000',
            ],
            [
                'nama' => 'Poles Body',
                'tipekendaraan' => 'Mobil',
                'harga' => '275000',
            ],
            [
                'nama' => 'Perawatan Interior',
                'tipekendaraan' => 'Mobil',
                'harga' => '350000',
            ],
            [
                'nama' => 'Paket Lengkap',
                'tipekendaraan' => 'Mobil',
                'harga' => '450000',
            ],
            // Motor
            [
                'nama' => 'Cuci Motor Kecil',
                'tipekendaraan' => 'Motor',
                'harga' => '15000',
            ],
            [
                'nama' => 'Cuci Motor Besar',
                'tipekendaraan' => 'Motor',
                'harga' => '20000',
            ],
            [
                'nama' => 'Poles Motor',
                'tipekendaraan' => 'Motor',
                'harga' => '40000',
            ],
        ]);
    }
}
