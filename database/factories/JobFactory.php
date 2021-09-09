<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // Faking data for representing a visual UI
        return [
            'company_id' => $this->faker->numberBetween(1, 15), // db is seeded with some example companies
            'city_id' => $this->faker->numberBetween(1, 10), // db is seeded some 30 example cities
            'title' => $this->faker->jobTitle(),
            'intro' => $this->faker->paragraph( 10 ),
            'description' => $this->faker->paragraph( 25 ),
            'contact' => $this->faker->unique()->safeEmail(),
            'type' => $this->faker->randomElement( ['Blue Collar', 'White Collar'] )
        ];
    }
}
