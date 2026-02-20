<?php

namespace App\Infrastructure\Company\Repositories;

use App\Domain\Company\Repositories\CompanyRepository;
use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentCompanyRepository implements CompanyRepository
{
  /**
   * Get paginated companies.
   */
  public function getPaginated(int $perPage = 10, ?string $search = null): LengthAwarePaginator
  {
    return Company::query()
      ->with(['createdBy:id,name', 'updatedBy:id,name'])
      ->when($search, function ($query) use ($search) {
        $search = strtolower($search);

        $query->where(function ($q) use ($search) {
          $q->whereRaw('LOWER(name) like ?', ["%{$search}%"])
            ->orWhereRaw('LOWER(description) like ?', ["%{$search}%"]);
        });
      })
      ->latest()
      ->paginate($perPage)
      ->withQueryString();
  }

  /**
   * Create a new company.
   */
  public function create(array $data): Company
  {
    return Company::create($data);
  }

  /**
   * Update an existing company.
   */
  public function update(Company $company, array $data): bool
  {
    return $company->update($data);
  }

  /**
   * Delete a company.
   */
  public function delete(Company $company): bool
  {
    return $company->delete();
  }
}
