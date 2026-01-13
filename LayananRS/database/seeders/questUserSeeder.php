<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class questUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //data dummy untuk tabel kontak_kamis sebanyak 10 entri orang indonesian
        $kontakKamisData = [
            ['name' => 'Andi Wijaya', 'email' => 'andi.wijaya@example.com'],
            ['name' => 'Budi Santoso', 'email' => 'budi.santoso@example.com'],
            ['name' => 'Citra Putri', 'email' => 'citra.putri@example.com'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi.lestari@example.com'],
            ['name' => 'Eko Wijaya', 'email' => 'eko.wijaya@example.com'],
            ['name' => 'Fajar Maulana', 'email' => 'fajar.maulana@example.com'],
            ['name' => 'Gita Pratiwi', 'email' => 'gita.pratiwi@example.com'],
            ['name' => 'Hadi Susanto', 'email' => 'hadi.susanto@example.com'],
            ['name' => 'Intan Wijaya', 'email' => 'intan.wijaya@example.com'],
            ['name' => 'Joko Santoso', 'email' => 'joko.santoso@example.com']
        ];

        DB::transaction(function () use ($kontakKamisData) {
            foreach ($kontakKamisData as $data) {
                DB::table('kontak_kamis')->insert([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'subject' => 'Pertanyaan tentang layanan',
                    'message' => 'Saya ingin mengetahui lebih lanjut tentang layanan yang Anda tawarkan.',
                    'is_read' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });


    }
}
