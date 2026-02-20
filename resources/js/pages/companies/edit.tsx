import { Head, Link } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';
import { BreadcrumbItem } from '@/types';
import CompanyForm from '../../components/companies/company-form';

import CompanyIndexController from '@/actions/App/Http/Controllers/Company/CompanyIndexController';
import CompanyEditController from '@/actions/App/Http/Controllers/Company/CompanyEditController';

interface Company {
  id: number;
  name: string;
  description: string | null;
  logo: string | null;
}

export default function Edit({ company }: { company: Company }) {
  const breadcrumbs: BreadcrumbItem[] = [
    {
      title: 'Compañias',
      href: CompanyIndexController.url(),
    },
    {
      title: 'Editar Compañia',
      href: CompanyEditController.url({ company: company.id }),
    },
  ];

  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title="Edit Company" />

      <div className="mx-auto flex w-full max-w-4xl flex-1 flex-col gap-6 rounded-xl p-4">
        <div className="flex items-center justify-between">
          <div>
            <h2 className="text-xl leading-tight font-semibold text-gray-800 dark:text-gray-200">
              Editar Compañia
            </h2>
            <p className="mt-1 text-sm text-gray-500 dark:text-gray-400">
              Actualiza los datos de la compañia.
            </p>
          </div>
          <Link
            href={CompanyIndexController.url()}
            className="text-sm text-blue-600 hover:underline dark:text-blue-500"
          >
            Volver a Compañias
          </Link>
        </div>

        <div className="rounded-lg border border-sidebar-border bg-white p-6 shadow-sm dark:bg-black">
          <CompanyForm company={company} isUpdating={true} />
        </div>
      </div>
    </AppLayout>
  );
}
