<?php

namespace App\Http\Requests;

use App\DataTransfer\CreateUserDTO;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'type' => 'required|numeric|min:1',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|max:250'
        ];
    }

    public function getDTO() :CreateUserDTO
    {
        return CreateUserDTO::create(
          $this->input('name'),
          $this->input('description'),
          $this->input('type'),
          $this->file('file'),
        );
    }


}
