<?php

namespace Tests\Unit\Actions\Company;

use App\Actions\Company\CreateCompanyAction;
use App\Domain\Company\Repositories\CompanyRepository;
use App\Models\Company;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Mockery;
use Tests\TestCase;

class CreateCompanyActionTest extends TestCase
{
    public function test_it_handles_logo_upload_correctly()
    {
        Storage::fake('public');

        $repository = Mockery::mock(CompanyRepository::class);
        $logo = UploadedFile::fake()->image('logo.jpg');

        $data = [
            'name' => 'Test Company',
            'logo' => $logo,
        ];

        $repository->shouldReceive('create')
            ->once()
            ->with(Mockery::on(function ($argument) {
                return $argument['name'] === 'Test Company' && str_contains($argument['logo'], 'companies/');
            }))
            ->andReturn(new Company);

        $action = new CreateCompanyAction($repository);
        $action->execute($data);

        Storage::disk('public')->assertExists('companies/'.$logo->hashName());
    }

    public function test_it_can_create_company_without_logo()
    {
        $repository = Mockery::mock(CompanyRepository::class);
        $data = [
            'name' => 'Test Company',
            'logo' => null,
        ];

        $repository->shouldReceive('create')
            ->once()
            ->with($data)
            ->andReturn(new Company);

        $action = new CreateCompanyAction($repository);
        $action->execute($data);
    }
}
