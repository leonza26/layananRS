<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //
        // \App\Models\User::factory(10)->create();

        // // cretae admin user
        // \App\Models\User::factory()->create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@example.com',
        //     'password' => 'admin123#',
        //     'role' => '0',
        // ]);

        // create pasien user
        \App\Models\User::factory()->create([
            'name' => 'Pasien User',
            'email' => 'pasien@example.com',
            'password' => 'pasien123#',
            'role' => '2',
        ]);
    }
}
