<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\Shared\CountriesSeeder;
use Database\Seeders\Shared\StatesSeeder;
use Database\Seeders\Shared\MunicipalitiesSeeder;

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
