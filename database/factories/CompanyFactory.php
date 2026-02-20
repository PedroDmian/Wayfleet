<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
  protected $model = Company::class;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $name = $this->faker->company();

    return [
      'name' => $name,
      'slug' => Str::slug($name, '-', 'es', ['max_length' => 30]),
      'description' => $this->faker->paragraph(3),
      'logo' => $this->downloadLogo(),
      'created_by' => User::inRandomOrder()->first()?->id ?? User::factory(),
      'updated_by' => User::inRandomOrder()->first()?->id ?? User::factory(),
    ];
  }

  /**
   * Download a fake logo and return the path.
   */
  private function downloadLogo(): ?string
  {
    try {
      $directory = 'logos';
      if (!Storage::disk('public')->exists($directory)) {
        Storage::disk('public')->makeDirectory($directory);
      }

      $filename = Str::random(10) . '.jpg';
      $path = $directory . '/' . $filename;

      // Using a nice stable placeholder for logos
      $response = Http::get("https://picsum.photos/200/200");

      if ($response->successful()) {
        Storage::disk('public')->put($path, $response->body());
        return $path;
      }
    } catch (\Exception $e) {
      // Fallback to null if anything fails during download
      return null;
    }

    return null;
  }
}
