import { Head, Link, router } from '@inertiajs/react';
import { Search } from 'lucide-react';
import { useState, useEffect, useRef } from 'react';
import CompanyCreateController from '@/actions/App/Http/Controllers/Company/CompanyCreateController';
import CompanyIndexController from '@/actions/App/Http/Controllers/Company/CompanyIndexController';
import { Button } from '@/components/ui/button';
import { DataTable } from '@/components/ui/data-table';
import { Input } from '@/components/ui/input';
import type { ViewType } from '@/components/view-toggle';
import ViewToggle from '@/components/view-toggle';
import AppLayout from '@/layouts/app-layout';
import { cleanLabel } from '@/lib/utils';
import type { BreadcrumbItem } from '@/types';

import { columns } from '../../components/companies/columns';

import type { Company } from '../../components/companies/company-card';
import CompanyCard from '../../components/companies/company-card';

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Companies',
    href: CompanyIndexController.url(),
  },
];

export default function Index({
  companies,
  filters,
}: {
  companies: {
    data: Company[];
    links: { url: string | null; label: string; active: boolean }[];
  };
  filters?: { search?: string };
}) {
  const [view, setView] = useState<ViewType>('grid');
  const [search, setSearch] = useState(filters?.search || '');
  const isInitialRender = useRef(true);

  useEffect(() => {
    if (isInitialRender.current) {
      isInitialRender.current = false;
      return;
    }

    const debounce = setTimeout(() => {
      router.get(
        CompanyIndexController.url(),
        { search },
        {
          preserveState: true,
          replace: true,
        },
      );
    }, 300);

    return () => clearTimeout(debounce);
  }, [search]);

  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title="Companies" />
      <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
        <div className="flex flex-col items-center justify-between gap-4 sm:flex-row">
          <h2 className="min-w-max text-xl leading-tight font-semibold text-gray-800 dark:text-gray-200">
            Listado de Compañias
          </h2>

          <div className="relative flex w-full max-w-md flex-1 items-center sm:w-auto">
            <Search className="absolute left-3 h-4 w-4 text-gray-400" />
            <Input
              type="search"
              placeholder="Buscar compañias por nombre o descripción..."
              value={search}
              onChange={(e) => setSearch(e.target.value)}
              className="w-full bg-white pl-9 dark:bg-black"
            />
          </div>

          <div className="flex flex-wrap items-center gap-2">
            <Link href={CompanyCreateController.url()}>
              <Button>Crear Compañia</Button>
            </Link>

            <ViewToggle view={view} onViewChange={setView} />
          </div>
        </div>

        {view === 'grid' && (
          <div className="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            {companies.data.map((company: Company) => (
              <CompanyCard key={company.id} {...company} />
            ))}
          </div>
        )}

        {view === 'table' && (
          <DataTable columns={columns} data={companies.data as Company[]} />
        )}

        {companies.links && companies.links.length > 3 && (
          <div className="mt-4 flex justify-center pb-4">
            <div className="flex items-center gap-1">
              {companies.links.map((link, index) => (
                <Link
                  key={index}
                  href={link.url || '#'}
                  preserveState
                  preserveScroll
                  className={`rounded px-3 py-1 ${link.active ? 'bg-gray-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300'} ${!link.url ? 'cursor-not-allowed opacity-50' : ''}`}
                  dangerouslySetInnerHTML={{
                    __html: cleanLabel(link.label),
                  }}
                />
              ))}
            </div>
          </div>
        )}
      </div>
    </AppLayout>
  );
}
