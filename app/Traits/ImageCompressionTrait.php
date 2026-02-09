<?php

namespace App\Traits;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

trait ImageCompressionTrait
{
    /**
     * Compress and store image
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param int $quality
     * @param int|null $maxWidth
     * @return string
     */
    public function compressAndStore(UploadedFile $file, string $directory, int $quality = 85, ?int $maxWidth = 1920): string
    {
        // Generate filename
        $filename = $file->hashName();

        // Create ImageManager with GD driver
        $manager = new ImageManager(new Driver());

        // Read and compress image
        $image = $manager->read($file);

        // Resize if width exceeds max width
        if ($maxWidth && $image->width() > $maxWidth) {
            $image->scale(width: $maxWidth);
        }

        // Encode with compression (preserves original format)
        $encoded = $image->encode(new AutoEncoder(quality: $quality));

        // Store in public disk
        $path = $directory . '/' . $filename;
        Storage::disk('public')->put($path, $encoded);

        return $path;
    }
}
