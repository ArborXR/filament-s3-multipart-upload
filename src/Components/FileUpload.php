<?php

declare(strict_types=1);

namespace CloudMazing\FilamentS3MultipartUpload\Components;

use Filament\Forms\Components\Field;

class FileUpload extends Field
{
    protected string $view = 'filament-s3-multipart-upload::components.file-upload';

    protected int $maxFileSize = 5 * 1024 * 1024; // 5GB

    public function hasAwsConfigured(): bool
    {
        return config('filesystems.disks.s3.bucket')
            && config('filesystems.disks.s3.key')
            && config('filesystems.disks.s3.region')
            && config('filesystems.disks.s3.secret');
    }

    public function companionUrl(): string
    {
        return '/'.config('filament-s3-multipart-upload.prefix');
    }

    public function getMaxFileSize(): int
    {
        return $this->maxFileSize;
    }

    public function maxFileSize(int $bytes): self
    {
        $this->maxFileSize = $bytes;

        return $this;
    }
}
