<?php

namespace App\Actions\Company;

use App\Domain\Company\Repositories\CompanyRepository;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class UpdateCompanyAction
{
  public function __construct(
    protected CompanyRepository $repository
  ) {
  }

  public function execute(Company $company, array $data): bool
  {
    if (isset($data['logo']) && $data['logo'] instanceof \Illuminate\Http\UploadedFile) {
      if ($company->logo) {
        Storage::disk('public')->delete($company->logo);
      }
      $path = $data['logo']->store('companies', 'public');
      $data['logo'] = $path;
    } elseif (array_key_exists('logo', $data) && $data['logo'] === null) {
      if ($company->logo) {
        Storage::disk('public')->delete($company->logo);
      }
    }

    return $this->repository->update($company, $data);
  }
}
