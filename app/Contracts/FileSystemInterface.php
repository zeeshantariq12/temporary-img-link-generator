<?php

namespace App\Contracts;

use Illuminate\Http\UploadedFile;

interface FileSystemInterface
{
    public function upload(UploadedFile $file, string $strStrPathToTo, ?string $fileName = null);

}
