<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticate
{
    use HasApiTokens,HasFactory;

    const UPLOAD_DIRECTORY = '/images/users/';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'file',
        'type'
    ];

    public function getImageUrlAttribute()
    {
        return Storage::temporaryUrl($this->file, now()->addMinutes(10));
    }

}
