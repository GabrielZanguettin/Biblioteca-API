<?php
namespace App\Repositories;
use App\Models\User;

class UserRepository {
    public function get() {
        return User::all();
    }

    public function getById(int $id)
    {
        return User::findOrFail($id);
    }

    public function getReviewsByUserId(int $id) {
        $user = $this->getById($id);
        return $user->reviews;
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function updateUser(int $id, array $data) {
        $user = $this->getById($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser(int $id) {
        $user = $this->getById($id);
        $user->delete();
        return $user;
    }
}