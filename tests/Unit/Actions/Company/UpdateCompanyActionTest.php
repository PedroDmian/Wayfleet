<?php

namespace Tests\Unit\Actions\Company;

use App\Actions\Company\UpdateCompanyAction;
use App\Domain\Company\Repositories\CompanyRepository;
use App\Models\Company;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Mockery;
use Tests\TestCase;

class UpdateCompanyActionTest extends TestCase
{
    public function test_it_replaces_old_logo_on_update()
    {
        Storage::fake('public');
        $oldLogoPath = 'companies/old-logo.jpg';
        Storage::disk('public')->put($oldLogoPath, 'content');

        $company = new Company(['logo' => $oldLogoPath]);
        $repository = Mockery::mock(CompanyRepository::class);
        $newLogo = UploadedFile::fake()->image('new-logo.jpg');

        $data = [
            'name' => 'New Name',
            'logo' => $newLogo,
        ];

        $repository->shouldReceive('update')
            ->once()
            ->with($company, Mockery::on(function ($argument) {
                return $argument['name'] === 'New Name' && str_contains($argument['logo'], 'companies/');
            }))
            ->andReturn(true);

        $action = new UpdateCompanyAction($repository);
        $action->execute($company, $data);

        Storage::disk('public')->assertMissing($oldLogoPath);
        Storage::disk('public')->assertExists('companies/'.$newLogo->hashName());
    }

    public function test_it_deletes_logo_when_explicitly_set_to_null()
    {
        Storage::fake('public');
        $oldLogoPath = 'companies/old-logo.jpg';
        Storage::disk('public')->put($oldLogoPath, 'content');

        $company = new Company(['logo' => $oldLogoPath]);
        $repository = Mockery::mock(CompanyRepository::class);

        $data = [
            'logo' => null,
        ];

        $repository->shouldReceive('update')
            ->once()
            ->with($company, $data)
            ->andReturn(true);

        $action = new UpdateCompanyAction($repository);
        $action->execute($company, $data);

        Storage::disk('public')->assertMissing($oldLogoPath);
    }
}
