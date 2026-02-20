import { Camera, X } from 'lucide-react';
import type { ChangeEvent } from 'react';
import { useState, useRef } from 'react';
import { cn } from '@/lib/utils';
import { ImageCropper } from './image-cropper';
import { Button } from './ui/button';

interface AvatarUploadProps {
  onImageCropped: (file: File) => void;
  defaultValue?: string | null;
  className?: string;
  error?: string;
}

export function AvatarUpload({
  onImageCropped,
  defaultValue,
  className,
  error,
}: AvatarUploadProps) {
  const [imageSrc, setImageSrc] = useState<string | null>(null);
  const [croppedImage, setCroppedImage] = useState<string | null>(
    defaultValue ? `/storage/${defaultValue}` : null,
  );
  const [isCropperOpen, setIsCropperOpen] = useState(false);
  const fileInputRef = useRef<HTMLInputElement>(null);

  const onFileChange = async (e: ChangeEvent<HTMLInputElement>) => {
    if (e.target.files && e.target.files.length > 0) {
      const file = e.target.files[0];
      const reader = new FileReader();
      reader.addEventListener('load', () => {
        setImageSrc(reader.result?.toString() || null);
        setIsCropperOpen(true);
      });
      reader.readAsDataURL(file);
    }
  };

  const handleCropComplete = (blob: Blob) => {
    const croppedFile = new File([blob], 'avatar-cropped.jpg', {
      type: 'image/jpeg',
    });
    const url = URL.createObjectURL(blob);

    setCroppedImage(url);
    onImageCropped(croppedFile);
  };

  const clearSelection = () => {
    setImageSrc(null);
    setCroppedImage(null);

    if (fileInputRef.current) {
      fileInputRef.current.value = '';
    }
  };

  return (
    <div className={cn('space-y-4', className)}>
      <div className="flex items-center gap-4">
        <div
          className={cn(
            'relative flex h-20 w-20 shrink-0 items-center justify-center overflow-hidden rounded-lg border-2 border-dashed border-neutral-300 bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-900',
            error &&
              'border-red-500 bg-red-50 dark:border-red-900 dark:bg-red-950/20',
          )}
        >
          {croppedImage ? (
            <img
              src={croppedImage}
              alt="Preview"
              className="h-full w-full object-cover"
            />
          ) : (
            <Camera className="h-8 w-8 text-neutral-400" />
          )}

          <button
            type="button"
            onClick={() => fileInputRef.current?.click()}
            className="absolute inset-0 bg-black/0 transition-colors hover:bg-black/10 focus:outline-none"
            aria-label="Upload logo"
          />
        </div>

        <div className="flex flex-col gap-2">
          <div className="flex gap-2">
            <Button
              type="button"
              variant="outline"
              size="sm"
              onClick={() => fileInputRef.current?.click()}
            >
              {croppedImage ? 'Cambiar logo' : 'Subir logo'}
            </Button>
            {croppedImage && (
              <Button
                type="button"
                variant="ghost"
                size="sm"
                onClick={clearSelection}
                className="text-red-500 hover:bg-red-50 hover:text-red-600 dark:hover:bg-red-950/20"
              >
                <X className="mr-1 h-4 w-4" />
                Eliminar
              </Button>
            )}
          </div>
          <p className="text-xs text-neutral-500">
            JPG, PNG o GIF. Tamaño recomendado: 400x400px.
          </p>
        </div>
      </div>

      <input
        type="file"
        ref={fileInputRef}
        onChange={onFileChange}
        accept="image/*"
        className="hidden"
      />

      {imageSrc && (
        <ImageCropper
          image={imageSrc}
          open={isCropperOpen}
          onOpenChange={setIsCropperOpen}
          onCropComplete={handleCropComplete}
        />
      )}
    </div>
  );
}
