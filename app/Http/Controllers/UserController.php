<?php

namespace App\Http\Controllers;

use App\Contracts\UserInterface;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(private readonly UserInterface $userService)
    {}

    public function index(): UserResourceCollection
    {
        return new UserResourceCollection($this->userService->getAll());
    }

    public function store(UserRequest $userRequest)
    {
        $user = $this->userService->create($userRequest->getDTO());
        return response()->json(['user' => UserResource::make($user), 'message' => 'Successfully added the user'], Response::HTTP_CREATED);
    }

    public function show(User $user)
    {
        return response(['user' => UserResource::make($user)], Response::HTTP_OK);
    }

    public function getImageUrl($path)
    {
        return $this->userService->generateFilePath($path);
    }
}
