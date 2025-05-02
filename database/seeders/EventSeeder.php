<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menggunakan Faker dengan lokalisasi Indonesia
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 100; $i++) {
            DB::table('event')->insert([
                'nama_event' => $faker->sentence(3),
                'event_organizer' => $faker->company,
                'jenis_event' => $faker->randomElement(['musik', 'keagamaan', 'culture', 'pameran', 'budaya']),
                'tanggal_event' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
                'lokasi_event' => $faker->address,
                'rating' => $faker->randomFloat(1, 1, 10), // Float antara 1.0 - 5.0
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}