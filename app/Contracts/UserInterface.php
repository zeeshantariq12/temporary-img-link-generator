<?php

namespace App\Contracts;

use App\DataTransfer\CreateUserDTO;
use Illuminate\Http\UploadedFile;

interface UserInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param array $inputs
     * @param UploadedFile $file
     * @return mixed
     */
    public function create(CreateUserDTO $createUserDTO);

    /**
     * @param $file
     * @return mixed
     */
    public function fileUpload($file);

    /**
     * @param $path
     * @return mixed
     */
    public function generateFilePath($path);


}

