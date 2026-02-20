<?php

namespace Database\Seeders;

use Database\Seeders\Shared\CountriesSeeder;
use Database\Seeders\Shared\MunicipalitiesSeeder;
use Database\Seeders\Shared\StatesSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CountriesSeeder::class);
        $this->call(StatesSeeder::class);
        $this->call(MunicipalitiesSeeder::class);
        $this->call(CompanySeeder::class);
    }
}
