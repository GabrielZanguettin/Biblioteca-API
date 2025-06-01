<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function get()
    {
        $users = $this->userRepository->get();
        return $users;
    }

    public function getById(int $id)
    {
        return $this->userRepository->getById($id);
    }

    public function getReviewsByUserId(int $id) {
        return $this->userRepository->getReviewsByUserId($id);
    }

    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->createUser($data);
    }

    public function updateUser(int $id, array $data) {
        return $this->userRepository->updateUser($id, $data);
    }

    public function deleteUser(int $id) {
        return $this->userRepository->deleteUser($id);
    }
}
