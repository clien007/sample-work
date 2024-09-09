<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'duration' => $this->faker->numberBetween(30, 180),
            'description' => $this->faker->sentence,
        ];
    }
}
