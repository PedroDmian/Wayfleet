import { Link, router } from '@inertiajs/react';
import {
  Card,
  CardContent,
  CardFooter,
  CardHeader,
} from '@/components/ui/card';
import {
  MapPin,
  Briefcase,
  Users,
  Code,
  MoreVertical,
  Pencil,
  Trash2,
  Building2,
} from 'lucide-react';
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Button } from '@/components/ui/button';
import CompanyEditController from '@/actions/App/Http/Controllers/Company/CompanyEditController';
import CompanyDeleteController from '@/actions/App/Http/Controllers/Company/CompanyDeleteController';
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

export default function CompanyCard(company: Company) {
  const location = 'Monterrey, Nuevo León, México';
  const category = 'Logistics Provider';
  const employees = '10,000 employees';
  const techStack = 'React, Laravel, PostgreSQL';
  const rating = 4.5;
  const reviews = 200;

  const handleDelete = () => {
    sileo.error({
      title: `¿Eliminar el registro ${company.name}?`,
      description: `No podrás recuperarlo.`,
      icon: <Trash2 className="h-4 w-4 text-red-600" />,
      button: {
        title: 'Si, Adelante',
        onClick: () => {
          router.delete(CompanyDeleteController.url({ company: company.id }), {
            onSuccess: () =>
              sileo.success({ title: 'Compañía eliminada con éxito' }),
          });
        },
      },
    });
  };

  return (
    <Card className="flex h-full flex-col border-sidebar-border bg-white shadow-sm transition-shadow hover:shadow-md dark:bg-black">
      <CardHeader className="relative flex flex-row items-start justify-between space-y-0 pb-2">
        <div className="flex items-center gap-3">
          {company.logo ? (
            <img
              src={`/storage/${company.logo}`}
              alt={company.name}
              className="h-12 w-12 rounded-full border object-cover"
            />
          ) : (
            <div className="flex h-12 w-12 shrink-0 items-center justify-center rounded-full border bg-gray-100 text-gray-500 dark:bg-gray-800">
              <Building2 className="h-6 w-6" />
            </div>
          )}
          <div className="flex flex-col pt-1">
            <h3 className="text-base leading-tight font-semibold">
              {company.name}
            </h3>
            <div className="mt-1 flex items-center gap-1 text-xs text-yellow-500">
              <span className="text-gray-400">
                ★ {rating} {reviews} opiniones
              </span>
            </div>
          </div>
        </div>

        <DropdownMenu>
          <DropdownMenuTrigger asChild>
            <Button
              variant="ghost"
              className="absolute top-4 right-4 -mt-1 -mr-2 h-8 w-8 p-0 text-gray-400 hover:text-gray-900 dark:hover:text-gray-100"
            >
              <span className="sr-only">Abrir menú</span>
              <MoreVertical className="h-4 w-4" />
            </Button>
          </DropdownMenuTrigger>
          <DropdownMenuContent align="end" className="w-40">
            <DropdownMenuItem asChild className="cursor-pointer">
              <Link
                href={CompanyEditController.url({ company: company.id })}
                className="flex items-center"
              >
                <Pencil className="mr-2 h-4 w-4" />
                <span>Editar</span>
              </Link>
            </DropdownMenuItem>
            <DropdownMenuItem
              className="cursor-pointer text-red-600 focus:bg-red-50 focus:text-red-600 dark:focus:bg-red-950/50"
              onSelect={handleDelete}
            >
              <Trash2 className="mr-2 h-4 w-4 text-red-600 focus:bg-red-50 focus:text-red-600 dark:focus:bg-red-950/50" />
              <span>Eliminar</span>
            </DropdownMenuItem>
          </DropdownMenuContent>
        </DropdownMenu>
      </CardHeader>

      <CardContent className="flex-1 pb-4">
        <div className="mt-4 space-y-3 text-sm text-gray-500 dark:text-gray-400">
          <div className="flex items-center gap-2">
            <MapPin className="h-4 w-4 shrink-0" />
            <span className="truncate">{location}</span>
          </div>
          <div className="flex items-center gap-2">
            <Briefcase className="h-4 w-4 shrink-0" />
            <span className="truncate">{category}</span>
          </div>
          <div className="flex items-center gap-2">
            <Users className="h-4 w-4 shrink-0" />
            <span className="truncate">{employees}</span>
          </div>
          <div className="flex items-center gap-2">
            <Code className="h-4 w-4 shrink-0" />
            <span className="truncate">{techStack}</span>
          </div>
        </div>
      </CardContent>

      <CardFooter className="mt-auto border-t border-gray-100 pt-0 dark:border-gray-800/50">
        <p className="mt-4 text-xs leading-relaxed text-gray-500 dark:text-gray-400">
          {company.description
            ? company.description.substring(0, 100) +
              (company.description.length > 100 ? '...' : '')
            : 'No hay descripción disponible para esta empresa.'}
          {company.description && company.description.length > 100 && (
            <span className="ml-1 cursor-pointer font-medium text-blue-600 hover:underline dark:text-blue-500">
              ver más
            </span>
          )}
        </p>
      </CardFooter>
    </Card>
  );
}
