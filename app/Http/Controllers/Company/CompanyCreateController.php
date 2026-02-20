<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class CompanyCreateController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('companies/create');
    }
}
