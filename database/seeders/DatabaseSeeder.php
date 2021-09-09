<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Company;
use App\Models\City;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Job::factory(50)->create(); // Create database entries for model: Job.
        Company::factory(15)->create(); // Create database entries for model: Company.
        City::factory(10)->create(); // Create database entries for model: City.
    }
}
