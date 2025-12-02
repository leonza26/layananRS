<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create akun dokter
        \App\Models\User::updateOrCreate([
            'name' => 'dr. John Doe',
            'email' => 'john.doe@rs.com',
            'password' => 'password123#',
            'role' => '1',
        ]);
    }
}
