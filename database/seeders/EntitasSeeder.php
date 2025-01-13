<?php

namespace Database\Seeders;

use App\Models\daftar_entitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'singkatan' => 'BTC',
                'nama' => 'PT. Bunga Tulip Company',
                'alamat' => 'Cirebon',
                'remember_token' => '0',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'singkatan' => 'BTN',
                'nama' => 'PT. Bunga Tulip Nusantara',
                'alamat' => 'Jakarta',
                'remember_token' => '0',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($user as $key => $value) {
            daftar_entitas::create($value);
        }
    }
}
