<?php

namespace App\Domain\Company\Repositories;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;

interface CompanyRepository
{
  /**
   * Get paginated companies.
   *
   * @param int $perPage
   * @param string|null $search
   * @return LengthAwarePaginator
   */
  public function getPaginated(int $perPage = 10, ?string $search = null): LengthAwarePaginator;

  /**
   * Create a new company.
   *
   * @param array $data
   * @return Company
   */
  public function create(array $data): Company;

  /**
   * Update an existing company.
   *
   * @param Company $company
   * @param array $data
   * @return bool
   */
  public function update(Company $company, array $data): bool;

  /**
   * Delete a company.
   *
   * @param Company $company
   * @return bool
   */
  public function delete(Company $company): bool;
}
