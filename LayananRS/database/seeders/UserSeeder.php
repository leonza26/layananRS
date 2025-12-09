<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        DB::transaction(function () use ($faker) {
            // create 1 admin user
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123#'),
                'role' => '0', // Role 0 untuk Admin
            ]);

            // create 20 dummy patient users
            for ($i = 0; $i < 20; $i++) {
                $user = User::create([
                    'name' => $faker->name(),
                    'email' => $faker->unique()->safeEmail(),
                    'password' => Hash::make('password'), // password default
                    'role' => '2', // Role 2 untuk Pasien
                ]);
            }
        });
    }
}
