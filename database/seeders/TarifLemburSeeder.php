<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarifLemburSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'entitas' => 'BTC',
                'basic' => 'ANGGOTA',
                'level' => 'JABATAN',
                'kjk'   => '14.600',
                'insidentil' => '13.200',
            ],
            [
                'entitas' => 'BTC',
                'basic' => 'KABAG',
                'level' => 'JABATAN',
            ],
            [
                'entitas' => 'BTC',
                'basic' => 'KAPOK',
                'level' => 'JABATAN',
                'kjk'   => '16.200',
                'insidentil' => '14.000',
            ],
            [
                'entitas' => 'BTC',
                'basic' => 'KARU',
                'level' => 'JABATAN',
                'kjk'   => '18.900',
                'insidentil' => '14.300',
            ],
            [
                'entitas' => 'BTC',
                'basic' => 'KASIE',
                'level' => 'JABATAN',
            ],
            [
                'entitas' => 'BTC',
                'basic' => 'KOORDINATOR',
                'level' => 'JABATAN',
                'kjk'   => '21.100',
                'insidentil' => '20.600',
            ],
            [
                'entitas' => 'BTC',
                'basic' => 'MANAGER',
                'level' => 'JABATAN',
            ],
            [
                'entitas' => 'BTC',
                'basic' => 'STAFF',
                'level' => 'JABATAN',
            ],
            [
                'entitas' => 'BTC',
                'basic' => 'WAKIL KOORDINATOR',
                'level' => 'JABATAN',
                'kjk'   => '19.500',
                'insidentil' => '19.400',
            ],
            [
                'entitas' => 'BTC',
                'basic' => 'DANRU',
                'level' => 'JABATAN',
            ],
            [
                'entitas' => 'BTC',
                'basic' => 'WAKIL DANRU',
                'level' => 'JABATAN',
                'kjk'   => '18.900',
                'insidentil' => '18.400',
            ],

        ];

        foreach ($user as $key => $value) {
            DB::table('daftar_tarif_lembur')->insert($value);
        }
    }
}
