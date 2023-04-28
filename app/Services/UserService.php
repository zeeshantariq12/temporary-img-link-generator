<?php

namespace App\Services;

use App\Contracts\FileSystemInterface;
use App\Contracts\UserInterface;
use App\DataTransfer\CreateUserDTO;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class UserService implements UserInterface
{

    public function __construct(private readonly User $model, private readonly FileSystemInterface $objFilesystemContract)
    {}

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model::paginate(10);
    }

    /**
     * @param array $inputs
     * @param UploadedFile $file
     * @return mixed
     */
    public function create(CreateUserDTO $createUserDTO): User
    {
        return $this->model::create([
            'name' => $createUserDTO->getName(),
            'type' => $createUserDTO->getType(),
            'description' => $createUserDTO->getDescription(),
            'file' => $this->fileUpload($createUserDTO->getFile())
        ]);
    }


    /**
     * @param $file
     * @return string
     */
    public function fileUpload($file): string
    {
        $name = Str::uuid() . "." . $file->getClientOriginalExtension();
        $this->objFilesystemContract->upload($file, $this->model::UPLOAD_DIRECTORY, $name);
        return $name;
    }

    /**
     * @param $path
     * @return mixed
     */
    public function generateFilePath($path)
    {
        $newPath = storage_path('app' . $this->model::UPLOAD_DIRECTORY . $path);
        return Image::make($newPath)->response();
    }

}
