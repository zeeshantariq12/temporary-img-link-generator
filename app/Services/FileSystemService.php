<?php

namespace App\Services;

use App\Contracts\FileSystemInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileSystemService implements FileSystemInterface
{

    public function upload(UploadedFile $file, string $strPathTo, string $fileName = null)
    {
       Storage::putFileAs($strPathTo, $file , $fileName);
    }
}
