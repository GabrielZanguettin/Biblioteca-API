<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\ReviewResource;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    private UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function get() {
        $users = $this->userService->get();
        return UserResource::collection($users);
    }

    public function getById(int $id)
    {
        try {
            $user = $this->userService->getById($id);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return new UserResource($user);
    }

    public function getReviewsByUserId(int $id)
    {
        try {
            $reviews = $this->userService->getReviewsByUserId($id);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return ReviewResource::collection($reviews);
    }

    public function createUser(UserRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->createUser($data);
        return new UserResource($user);
    }

    public function updateUser(int $id, UserUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            $user = $this->userService->updateUser($id, $data);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return new UserResource($user);
    }

     public function deleteUser(int $id)
    {
        try {
            $user = $this->userService->deleteUser($id);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return new UserResource($user);
    }
}
