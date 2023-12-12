<?php

namespace Database\Seeders;

use App\Models\Guru_BK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruBkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guru_bk = [
            [
                'nip' => 175378,
                'nama' => 'Putri',
                'no_telp' => '08123456789'
            ],
            [
                'nip' => 736472,
                'nama' => 'Raden',
                'no_telp' => '08987654321'
            ],
        ];
        foreach($guru_bk as $key => $value) {
            Guru_BK::create($value);
        }
    }
}
