<?php

namespace App\Modules\ImageUpload;

class CloudinaryImageManager implements ImageManagerInterface
{

    public function save($file): string
    {
        return $this->cloudinary
            ->uploadApi()
            ->upload(is_string($file) ? $file : $file->getRealPath())['public_id'];
    }

    public function delete(string $name): void
    {
        $this->cloudinary->uploadApi()->destroy($name);
    }
}
