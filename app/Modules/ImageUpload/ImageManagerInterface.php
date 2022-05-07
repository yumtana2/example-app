<?php

namespace App\Modules\ImageUpload;

interface ImageManagerInterface
{
    public function save($file): string;

    public function delete(string $name): void;
}
