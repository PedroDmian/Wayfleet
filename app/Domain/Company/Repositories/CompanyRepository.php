<?php

namespace App\Domain\Company\Repositories;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;

interface CompanyRepository
{
    /**
     * Get paginated companies.
     */
    public function getPaginated(int $perPage = 10, ?string $search = null): LengthAwarePaginator;

    /**
     * Create a new company.
     */
    public function create(array $data): Company;

    /**
     * Update an existing company.
     */
    public function update(Company $company, array $data): bool;

    /**
     * Delete a company.
     */
    public function delete(Company $company): bool;
}
