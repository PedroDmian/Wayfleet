<?php

namespace Database\Seeders\Shared;

use App\Models\Shared\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'created_by' => 1,
            'name' => 'México',
            'key' => 'MEX',
        ]);
        Country::create([
            'created_by' => 1,
            'name' => 'Estados Unidos',
            'key' => 'USA',
        ]);
        Country::create([
            'created_by' => 1,
            'name' => 'Canadá',
            'key' => 'CAN',
        ]);
    }
}
