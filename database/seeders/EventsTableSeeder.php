<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use Faker\Factory as Faker;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            $user = User::inRandomOrder()->first();

            Event::create([
                'title' => $faker->sentence(4),
                'description' => $faker->paragraph(3),
                'location' => $faker->address(),
                'date' => $faker->dateTimeBetween('now', '+1 year'),
                'user_id' => $user->id,
            ]);
        }
    }
}

