<?php

namespace Tests\Feature\Company;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CompanyFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_guests_cannot_access_companies_index()
    {
        $response = $this->get(route('companies'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_users_can_visit_companies_index()
    {
        Company::factory()->count(3)->create();

        $response = $this->actingAs($this->user)->get(route('companies'));

        $response->assertOk();
        $response->assertInertia(
            fn ($page) => $page
                ->component('companies/index')
                ->has('companies.data', 3)
        );
    }

    public function test_authenticated_users_can_search_companies()
    {
        Company::factory()->create(['name' => 'Specific Company']);
        Company::factory()->create(['name' => 'Other One']);

        $response = $this->actingAs($this->user)->get(route('companies', ['search' => 'Specific']));

        $response->assertOk();
        $response->assertInertia(
            fn ($page) => $page
                ->component('companies/index')
                ->has('companies.data', 1)
                ->where('companies.data.0.name', 'Specific Company')
        );
    }

    public function test_create_company_screen_can_be_rendered()
    {
        $response = $this->actingAs($this->user)->get(route('companies.create'));

        $response->assertOk();
        $response->assertInertia(fn ($page) => $page->component('companies/create'));
    }

    public function test_company_can_be_stored()
    {
        Storage::fake('public');
        $logo = UploadedFile::fake()->image('logo.png');

        $response = $this->actingAs($this->user)->post(route('companies.store'), [
            'name' => 'New Company',
            'slug' => 'new-company',
            'description' => 'A description',
            'logo' => $logo,
        ]);

        $response->assertRedirect(route('companies'));
        $this->assertDatabaseHas('companies', ['name' => 'New Company']);

        $company = Company::where('name', 'New Company')->first();
        Storage::disk('public')->assertExists($company->logo);
    }

    public function test_edit_company_screen_can_be_rendered()
    {
        $company = Company::factory()->create();

        $response = $this->actingAs($this->user)->get(route('companies.edit', $company));

        $response->assertOk();
        $response->assertInertia(
            fn ($page) => $page
                ->component('companies/edit')
                ->has('company')
                ->where('company.id', $company->id)
        );
    }

    public function test_company_can_be_updated()
    {
        $company = Company::factory()->create(['name' => 'Old Name']);

        $response = $this->actingAs($this->user)->put(route('companies.update', $company), [
            'name' => 'Updated Name',
            'slug' => 'updated-name',
        ]);

        $response->assertRedirect(route('companies'));
        $this->assertDatabaseHas('companies', [
            'id' => $company->id,
            'name' => 'Updated Name',
        ]);
    }

    public function test_company_can_be_deleted()
    {
        $company = Company::factory()->create();

        $response = $this->actingAs($this->user)->delete(route('companies.destroy', $company));

        $response->assertRedirect(route('companies'));
        $this->assertSoftDeleted('companies', ['id' => $company->id]);
    }
}
