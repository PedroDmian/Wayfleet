<?php

namespace App\Http\Controllers\Company;

use App\Actions\Company\DeleteCompanyAction;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;

class CompanyDeleteController extends Controller
{
    public function __construct(
        protected DeleteCompanyAction $action
    ) {}

    public function __invoke(Company $company): RedirectResponse
    {
        $this->action->execute($company);

        return to_route('companies')->with('success', 'Company deleted successfully.');
    }
}
