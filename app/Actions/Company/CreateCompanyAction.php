<?php

namespace App\Actions\Company;

use App\Domain\Company\Repositories\CompanyRepository;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CreateCompanyAction
{
  public function __construct(
    protected CompanyRepository $repository
  ) {
  }

  public function execute(array $data): Company
  {
    if (isset($data['logo']) && $data['logo'] instanceof \Illuminate\Http\UploadedFile) {
      $path = $data['logo']->store('companies', 'public');

      $data['logo'] = $path;
    }

    return $this->repository->create($data);
  }
}
