import { Head } from '@inertiajs/react';
import { ChevronLeft } from 'lucide-react';

import CompanyCreateController from '@/actions/App/Http/Controllers/Company/CompanyCreateController';
import CompanyIndexController from '@/actions/App/Http/Controllers/Company/CompanyIndexController';
import CompanyForm from '@/components/companies/company-form';
import { Button } from '@/components/ui/button';

import AppLayout from '@/layouts/app-layout';
import type { BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Companies',
    href: CompanyIndexController.url(),
  },
  {
    title: 'Create Company',
    href: CompanyCreateController.url(),
  },
];

export default function Create() {
  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title="Create Company" />
      <div className="mx-auto flex w-full max-w-4xl flex-1 flex-col gap-6 rounded-xl p-4">
        <div className="flex items-center justify-between">
          <div>
            <h2 className="text-xl leading-tight font-semibold text-gray-800 dark:text-gray-200">
              Crear Compañia
            </h2>
            <p className="mt-1 text-sm text-gray-500 dark:text-gray-400">
              Agrega una nueva compañia al sistema.
            </p>
          </div>
          <Button
            size="sm"
            className="btn bg-gray-100 text-gray-500 hover:bg-gray-200 dark:text-gray-600"
            onClick={() => history.back()}
          >
            <ChevronLeft className="h-4 w-4" />
            Volver a Compañias
          </Button>
        </div>

        <div className="rounded-lg border border-sidebar-border bg-white p-6 shadow-sm dark:bg-black">
          <CompanyForm />
        </div>
      </div>
    </AppLayout>
  );
}
