import { Toaster } from 'sileo';
import AppLayoutTemplate from '@/layouts/app/app-sidebar-layout';
import type { AppLayoutProps } from '@/types';

export default ({ children, breadcrumbs, ...props }: AppLayoutProps) => (
  <AppLayoutTemplate breadcrumbs={breadcrumbs} {...props}>
    <Toaster
      position={'top-center'}
      options={{
        duration: 3000,
        fill: 'black',
        styles: {
          title: 'text-white!',
          description: 'text-white/75!',
        },
      }}
    />
    {children}
  </AppLayoutTemplate>
);
