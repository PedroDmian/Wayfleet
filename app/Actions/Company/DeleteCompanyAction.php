<?php

namespace App\Actions\Company;

use App\Domain\Company\Repositories\CompanyRepository;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class DeleteCompanyAction
{
    public function __construct(
        protected CompanyRepository $repository
    ) {}

    public function execute(Company $company): bool
    {
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }

        return $this->repository->delete($company);
    }
}
