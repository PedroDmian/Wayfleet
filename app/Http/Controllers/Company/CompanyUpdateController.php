<?php

namespace App\Http\Controllers\Company;

use App\Actions\Company\UpdateCompanyAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;

class CompanyUpdateController extends Controller
{
    public function __construct(
        protected UpdateCompanyAction $action
    ) {}

    public function __invoke(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        $this->action->execute($company, $request->validated() + ['logo' => $request->file('logo')]);

        return to_route('companies')->with('success', 'Company updated successfully.');
    }
}
