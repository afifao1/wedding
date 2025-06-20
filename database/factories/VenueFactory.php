<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class VenueFactory extends Factory
{
    public function definition(): array
    {
        return [
            'service_id' => Service::inRandomOrder()->first()->id,
            'name' => $this->faker->company . ' To\'yxonasi',
            'location' => $this->faker->address,
            'capacity' => $this->faker->numberBetween(100, 1000),
            'price' => $this->faker->numberBetween(5000, 50000),
        ];
    }
}
