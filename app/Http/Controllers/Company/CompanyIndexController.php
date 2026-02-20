<?php

namespace App\Http\Controllers\Company;

use App\Domain\Company\Repositories\CompanyRepository;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class CompanyIndexController extends Controller
{
    public function __construct(
        protected CompanyRepository $repository
    ) {}

    public function __invoke(): Response
    {
        $search = request('search');

        $companies = $this->repository->getPaginated(12, $search);

        return Inertia::render('companies/index', [
            'companies' => $companies,
            'filters' => [
                'search' => $search,
            ],
        ]);
    }
}
