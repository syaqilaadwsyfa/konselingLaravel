<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Konseling;

class KonselingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $konseling = [
            [
                'siswa_id' => 2,
                'guruBk_id' => 1,
                'tgl_konseling' => '2023-12-25',
                'keluhan' => 'ga enakan',
                'hasil_konseling' => 'jadi anak bodoamatan',
                'status' => 'diterima',
            ],
            [
                'siswa_id' => 2,
                'guruBk_id' => 2,
                'tgl_konseling' => '2023-12-26',
                'keluhan' => 'ga enakan',
                'hasil_konseling' => 'jadi anak bodoamat',
                'status' => 'selesai',
            ],
            [
                'siswa_id' => 3,
                'guruBk_id' => 1,
                'tgl_konseling' => '2023-12-26',
                'keluhan' => 'ga ada sebenernya',
                'hasil_konseling' => '',
                'status' => 'pending',
            ],
        ];

        foreach($konseling as $key => $value) {
            Konseling::create($value);
        }
    }
}
