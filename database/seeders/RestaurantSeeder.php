<?php
// database/seeds/RestaurantSeeder.php

namespace Database\Seeders;

use App\Models\Restaurants;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 restaurants
        Restaurants::factory()->count(10)->create();
    }
}