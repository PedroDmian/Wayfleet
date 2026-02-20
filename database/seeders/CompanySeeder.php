<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Ensure at least one user exists to avoid creating too many users in the factory
    if (User::count() === 0) {
      User::factory()->create([
        'name' => 'Admin User',
        'email' => 'admin@wayfleet.com',
      ]);
    }

    Company::factory()->count(20)->create();
  }
}
