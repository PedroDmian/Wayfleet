import { Transition } from '@headlessui/react';
import { useForm } from '@inertiajs/react';
import { sileo } from 'sileo';

import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Button } from '@/components/ui/button';
import InputError from '@/components/input-error';
import { AvatarUpload } from '@/components/avatar-upload';

import CompanyStoreController from '@/actions/App/Http/Controllers/Company/CompanyStoreController';
import CompanyUpdateController from '@/actions/App/Http/Controllers/Company/CompanyUpdateController';

interface CompanyFormProps {
  company?: {
    id: number;
    name: string;
    description: string | null;
    logo: string | null;
  };
  isUpdating?: boolean;
}

export default function CompanyForm({
  company,
  isUpdating = false,
}: CompanyFormProps) {
  const actionForm = isUpdating
    ? CompanyUpdateController.form({ company: company?.id ?? 0 })
    : CompanyStoreController.form();

  const { data, setData, post, processing, recentlySuccessful, errors } =
    useForm({
      name: company?.name || '',
      description: company?.description || '',
      logo: null as File | null,
      _method: isUpdating ? 'put' : 'post',
    });

  const submit = (e: React.FormEvent) => {
    e.preventDefault();
    post(actionForm.action, {
      preserveScroll: true,
      onSuccess: () => {
        sileo.success({
          title: isUpdating
            ? 'Compañia actualizada con éxito'
            : 'Compañia creada con éxito',
        });
      },
    });
  };

  return (
    <form onSubmit={submit} className="space-y-6">
      <div className="grid gap-2">
        <Label htmlFor="logo">Logo de la empresa (Opcional)</Label>
        <AvatarUpload
          defaultValue={company?.logo}
          onImageCropped={(file: File) => setData('logo', file)}
          error={errors.logo}
        />
        <InputError message={errors.logo} className="mt-2" />
      </div>

      <div className="grid gap-2">
        <Label htmlFor="name">Nombre de la empresa</Label>
        <Input
          id="name"
          name="name"
          value={data.name}
          className="mt-1 block w-full"
          autoComplete="organization"
          onChange={(e) => setData('name', e.target.value)}
          required
        />
        <InputError message={errors.name} className="mt-2" />
      </div>

      <div className="grid gap-2">
        <Label htmlFor="description">Descripción (Opcional)</Label>
        <textarea
          id="description"
          name="description"
          value={data.description}
          className="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:outline-none disabled:cursor-not-allowed disabled:opacity-50"
          onChange={(e) => setData('description', e.target.value)}
        />
        <InputError message={errors.description} className="mt-2" />
      </div>

      <div className="flex items-center gap-4">
        <Button disabled={processing}>
          {isUpdating ? 'Actualizar compañia' : 'Crear compañia'}
        </Button>

        <Transition
          show={recentlySuccessful}
          enter="transition ease-in-out"
          enterFrom="opacity-0"
          leave="transition ease-in-out"
          leaveTo="opacity-0"
        >
          <p className="text-sm text-neutral-600">Guardado.</p>
        </Transition>
      </div>
    </form>
  );
}
