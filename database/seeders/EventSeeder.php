<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'name' => 'Morning Yoga',
            'duration' => 60, // 1 hour
            'description' => 'A relaxing morning yoga session.',
        ]);

        Event::create([
            'name' => 'Business Seminar',
            'duration' => 120, // 2 hours
            'description' => 'An insightful seminar on business trends.',
        ]);

        Event::create([
            'name' => 'Discovery Call',
            'duration' => 15,
            'description' => 'A hands-on art workshop for beginners.',
        ]);
    }
}
