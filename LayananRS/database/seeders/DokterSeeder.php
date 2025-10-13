<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create akun dokter
        \App\Models\User::factory()->create([
            'name' => 'dr. John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password123#',
            'role' => '1',
        ]);
    }
}
