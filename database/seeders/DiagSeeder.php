<?php

namespace Database\Seeders;

use App\Models\Diagnosis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Diagnosis::insert([
            'keterangan' => 'Normal',
            'deskripsi' => 'Fokus: Tetap mempertahankan hidup sehat'
        ]);
        Diagnosis::insert([
            'keterangan' => 'Sindrom Metabolik Ringan',
            'deskripsi' => 'Fokus: Pencegahan lebih lanjut dan perbaikan pola hidup'
        ]);
        Diagnosis::insert([
            'keterangan' => 'Sindrom Metabolik Sedang',
            'deskripsi' => 'Fokus: Pengendalian faktor risiko dan modifikasi gaya hidup lebih intensif'
        ]);
        Diagnosis::insert([
            'keterangan' => 'Sindrom Metabolik Berat',
            'deskripsi' => 'Fokus: Intervensi medis dan perubahan gaya hidup intensif'
        ]);
    }
}
