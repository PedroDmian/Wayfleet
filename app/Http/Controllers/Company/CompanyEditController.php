<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Inertia\Inertia;
use Inertia\Response;

class CompanyEditController extends Controller
{
    public function __invoke(Company $company): Response
    {
        return Inertia::render('companies/edit', [
            'company' => $company,
        ]);
    }
}
