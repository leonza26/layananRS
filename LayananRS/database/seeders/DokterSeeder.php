<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($faker = null): void
    {
        $faker = Faker::create('id_ID');

        $specializations = [
            'Dokter Umum', 'Dokter Gigi', 'Dokter Anak', 'Dokter Kandungan', 'Dokter Kulit',
            'Dokter THT', 'Dokter Mata', 'Dokter Jantung', 'Dokter Penyakit Dalam', 'Psikiater'
        ];

        DB::transaction(function () use ($faker, $specializations) {
            for ($i = 0; $i < 10; $i++) {
                // 1. Buat data user untuk dokter
                $user = User::create([
                    'name' => 'dr. ' . $faker->firstName() . ' ' . $faker->lastName(),
                    'email' => $faker->unique()->safeEmail(),
                    'password' => Hash::make('password'), // password default untuk semua dokter
                    'role' => '1', // Role 1 untuk dokter
                ]);

                // 2. Buat data dokter yang berelasi dengan user
                Dokter::create([
                    'user_id' => $user->id,
                    'specialization' => $faker->randomElement($specializations),
                    'biography' => $faker->paragraph(3),
                    'photo_url' => 'https://placehold.co/400x400/E2E8F0/4A5568?text=Dr',
                    'consultaion_fee' => $faker->numberBetween(100000, 500000),
                ]);
            }
        });
    }
}


// user : jamelah@gmail.com
// pass : jamelah123#
