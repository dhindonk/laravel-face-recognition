<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(3)->create();

        User::factory()->create([
            'name' => 'Dandip',
            'email' => 'admin@tes.com',
            'password' => Hash::make('admin123'),
            // 'role' => 'admin',
        ]);

        // data dummy for company
        \App\Models\Company::create([
            'name' => 'PT. APa',
            'email' => 'official@tes.com',
            'address' => 'Jl. Jalan yuk',
            'latitude' => '-6.5993931',
            'longitude' => '106.8097919',
            'radius_km' => '500',
            'time_in' => '08:00',
            'time_out' => '17:00',
        ]);

        $this->call([
            // AttendanceSeeder::class,
            // PermissionSeeder::class,
        ]);
    }
}
