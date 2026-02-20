'use client';

import { ColumnDef } from '@tanstack/react-table';
import { Link, router } from '@inertiajs/react';
import { Pencil, Trash2 } from 'lucide-react';

import CompanyEditController from '@/actions/App/Http/Controllers/Company/CompanyEditController';
import CompanyDeleteController from '@/actions/App/Http/Controllers/Company/CompanyDeleteController';
import { Button } from '@/components/ui/button';
import { sileo } from 'sileo';

export type Company = {
  id: number;
  name: string;
  slug: string;
  description: string | null;
  logo: string | null;
  created_at: string;
  updated_at: string;
};

export const columns: ColumnDef<Company>[] = [
  {
    accessorKey: 'logo',
    header: 'Logo',
    cell: ({ row }: { row: any }) => {
      const company = row.original;

      return company.logo ? (
        <img
          src={`/storage/${company.logo}`}
          alt={company.name}
          className="h-10 w-10 rounded-full object-cover"
        />
      ) : (
        <div className="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200 text-gray-500 dark:bg-gray-700">
          {company.name.charAt(0)}
        </div>
      );
    },
  },
  {
    accessorKey: 'name',
    header: 'Nombre de Compañia',
    cell: ({ row }: { row: any }) => {
      return (
        <span className="font-medium text-gray-900 dark:text-white">
          {row.getValue('name')}
        </span>
      );
    },
  },
  {
    accessorKey: 'description',
    header: 'Descripción',
    cell: ({ row }: { row: any }) => {
      const desc = row.getValue('description') as string | null;
      if (!desc) {
        return <span className="text-gray-400 italic">Sin descripción</span>;
      }
      return (
        <span>{desc.substring(0, 50) + (desc.length > 50 ? '...' : '')}</span>
      );
    },
  },
  {
    id: 'actions',
    header: () => <div className="text-right">Acciones</div>,
    cell: ({ row }: { row: any }) => {
      const company = row.original;

      const handleDelete = () => {
        sileo.error({
          title: `¿Eliminar el registro ${company.name}?`,
          description: 'No podrás recuperarlo.',
          icon: <Trash2 className="h-4 w-4 text-red-600" />,
          button: {
            title: 'Si, Adelante',
            onClick: () => {
              router.delete(
                CompanyDeleteController.url({ company: company.id }),
                {
                  onSuccess: () =>
                    sileo.success({ title: 'Compañía eliminada con éxito' }),
                },
              );
            },
          },
        });
      };

      return (
        <div className="flex justify-end gap-1">
          <Button
            variant="ghost"
            size="sm"
            asChild
            className="bg-gray-100 hover:bg-gray-50 dark:bg-gray-500 dark:hover:bg-gray-400"
          >
            <Link href={CompanyEditController.url({ company: company.id })}>
              <Pencil />
            </Link>
          </Button>
          <Button
            variant="ghost"
            size="sm"
            className="bg-gray-100 hover:bg-gray-50 dark:bg-gray-500 dark:hover:bg-gray-400"
            onClick={handleDelete}
          >
            <Trash2 />
          </Button>
        </div>
      );
    },
  },
];
