import { LayoutGrid, List } from 'lucide-react';
import type { HTMLAttributes } from 'react';
import { cn } from '@/lib/utils';

export type ViewType = 'grid' | 'table';

interface ViewToggleProps extends HTMLAttributes<HTMLDivElement> {
  view: ViewType;
  onViewChange: (view: ViewType) => void;
}

export default function ViewToggle({
  view,
  onViewChange,
  className = '',
  ...props
}: ViewToggleProps) {
  const tabs = [
    { value: 'grid' as ViewType, icon: LayoutGrid, label: 'Grid' },
    { value: 'table' as ViewType, icon: List, label: 'Table' },
  ];

  return (
    <div
      className={cn(
        'inline-flex gap-1 rounded-lg bg-neutral-100 p-1 dark:bg-neutral-800',
        className,
      )}
      {...props}
    >
      {tabs.map(({ value, icon: Icon, label }) => (
        <button
          key={value}
          onClick={() => onViewChange(value)}
          className={cn(
            'flex items-center rounded-md px-3.5 py-1.5 transition-colors',
            view === value
              ? 'bg-white shadow-xs dark:bg-neutral-700 dark:text-neutral-100'
              : 'text-neutral-500 hover:bg-neutral-200/60 hover:text-black dark:text-neutral-400 dark:hover:bg-neutral-700/60',
          )}
          aria-label={`View as ${label}`}
        >
          <Icon className="h-4 w-4" />
        </button>
      ))}
    </div>
  );
}
