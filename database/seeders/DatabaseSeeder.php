<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                'username' => 'habibi',
                'email' => 'habibi@gmail.com',
                'password' => Hash::make('123'),
                'tanggal_lahir' => '2003-07-20',
                'alamat' => 'Jl. Mawar No. 15',
                'no_telp' => '081234567890',
                'jenis_event' => 'musik',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
}