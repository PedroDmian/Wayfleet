<?php

namespace Tests\Unit\Infrastructure\Company\Repositories;

use App\Infrastructure\Company\Repositories\EloquentCompanyRepository;
use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EloquentCompanyRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected EloquentCompanyRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = new EloquentCompanyRepository;
    }

    public function test_it_can_create_a_company()
    {
        $user = User::factory()->create();
        $data = [
            'name' => 'Test Company',
            'slug' => 'test-company',
            'description' => 'Test Description',
            'created_by' => $user->id,
            'updated_by' => $user->id,
        ];

        $company = $this->repository->create($data);

        $this->assertInstanceOf(Company::class, $company);
        $this->assertEquals('Test Company', $company->name);
        $this->assertDatabaseHas('companies', ['name' => 'Test Company']);
    }

    public function test_it_can_update_a_company()
    {
        $company = Company::factory()->create(['name' => 'Old Name']);
        $data = ['name' => 'New Name'];

        $result = $this->repository->update($company, $data);

        $this->assertTrue($result);
        $this->assertEquals('New Name', $company->fresh()->name);
    }

    public function test_it_can_delete_a_company()
    {
        $company = Company::factory()->create();

        $result = $this->repository->delete($company);

        $this->assertTrue($result);
        $this->assertSoftDeleted('companies', ['id' => $company->id]);
    }

    public function test_it_can_get_paginated_companies_with_search()
    {
        Company::factory()->create(['name' => 'Apple Inc']);
        Company::factory()->create(['name' => 'Microsoft']);
        Company::factory()->create(['name' => 'Google']);

        $results = $this->repository->getPaginated(10, 'apple');

        $this->assertCount(1, $results->items());
        $this->assertEquals('Apple Inc', $results->items()[0]->name);
    }

    public function test_it_can_get_paginated_companies_without_search()
    {
        Company::factory()->count(15)->create();

        $results = $this->repository->getPaginated(10);

        $this->assertCount(10, $results->items());
        $this->assertEquals(15, $results->total());
    }
}
