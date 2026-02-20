<?php

namespace App\Http\Controllers\Company;

use App\Actions\Company\CreateCompanyAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreCompanyRequest;
use Illuminate\Http\RedirectResponse;

class CompanyStoreController extends Controller
{
  public function __construct(
    protected CreateCompanyAction $action
  ) {
  }

  public function __invoke(StoreCompanyRequest $request): RedirectResponse
  {
    $this->action->execute($request->validated() + ['logo' => $request->file('logo')]);

    return to_route('companies')->with('success', 'Company created successfully.');
  }
}
