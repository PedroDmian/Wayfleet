<?php

namespace Tests\Unit\Actions\Company;

use App\Actions\Company\DeleteCompanyAction;
use App\Domain\Company\Repositories\CompanyRepository;
use App\Models\Company;
use Mockery;
use Tests\TestCase;

class DeleteCompanyActionTest extends TestCase
{
    public function test_it_calls_repository_to_delete_company()
    {
        $company = new Company;
        $repository = Mockery::mock(CompanyRepository::class);

        $repository->shouldReceive('delete')
            ->once()
            ->with($company)
            ->andReturn(true);

        $action = new DeleteCompanyAction($repository);
        $result = $action->execute($company);

        $this->assertTrue($result);
    }
}
