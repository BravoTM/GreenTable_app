<?php
// database/factories/RestaurantFactory.php

namespace Database\Factories;

use App\Models\Restaurants;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RestaurantsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurants::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = ['Italian', 'Chinese', 'Mexican',  'Japanese'];
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->streetAddress,
            'phone_number' => $this->faker->phoneNumber,
            'website' => $this->faker->url,
            'categories' => $this->faker->randomElement($categories),
            'description' => $this->faker->paragraph,
            'hours_of_operation' => implode(', ', [
                'Monday' => '10:00 AM - 10:00 PM',
                'Tuesday' => '10:00 AM - 10:00 PM',
                'Wednesday' => '10:00 AM - 10:00 PM',
                'Thursday' => '10:00 AM - 10:00 PM',
                'Friday' => '10:00 AM - 11:00 PM',
                'Saturday' => '10:00 AM - 11:00 PM',
                'Sunday' => '10:00 AM - 10:00 PM',
            ]),
            'average_price_range' => $this->faker->randomElement(['$', '$$', '$$$']),
        ];
    }
}