<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('hashclaw137'),
                'role' => 'admin',
                'phone' => '0',
                'email' => '',
                'admin' => 'ALL',
                'payroll' => '1',
                'thr' => '1',
                'terlambat' => '1',
                'bpjs' => '1',
                'kupon' => '1',
                'lembur' => '1',
                'setting' => '1',
                'schedule' => '1',
                'logs' => '1',
                'pengguna' => '1',
                'daftar' => '1',
                'penerimaan' => '1',
                'lowongan' => '1',
                'lamaran' => '1',
                'wawancara' => '1',
                'approval' => '1',
                'karyawan' => '1',
                'legalitas' => '1',
                'absensi' => '1',
                'absen' => '1',
                'surat' => '1',
                'cuti' => '1',
                'administrasi' => '1',

            ],

            [
                'name' => 'Herlambang Yudha',
                'username' => 'Yudha',
                'password' => Hash::make('123'),
                'role' => 'admin',
                'phone' => '0',
                'email' => '',
                'admin' => '0',
                'payroll' => '0',
                'thr' => '0',
                'terlambat' => '0',
                'bpjs' => '0',
                'kupon' => '0',
                'lembur' => '0',
                'setting' => '0',
                'schedule' => '0',
                'logs' => '0',
                'pengguna' => '0',
                'daftar' => '0',
                'penerimaan' => '0',
                'lowongan' => '0',
                'lamaran' => '0',
                'wawancara' => '0',
                'approval' => '0',
                'karyawan' => '0',
                'legalitas' => '0',
                'absensi' => '0',
                'absen' => '1',
                'surat' => '1',
                'cuti' => '1',
                'administrasi' => '0',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
