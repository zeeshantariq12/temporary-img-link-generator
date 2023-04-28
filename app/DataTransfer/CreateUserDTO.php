<?php

namespace App\DataTransfer;

use Illuminate\Http\UploadedFile;

class CreateUserDTO implements DTO
{
    public function __construct(
        private readonly string $name,
        private readonly string $description,
        private readonly string $type,
        private readonly ?UploadedFile $file,
    ){}

    /**
     * @param string $name
     * @param string $description
     * @param string $type
     * @return static
     */
    public static function create(string $name, string $description, string $type,UploadedFile $file): self
    {
        return new self($name,$description,$type,$file);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

}
