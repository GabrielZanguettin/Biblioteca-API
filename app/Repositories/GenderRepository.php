<?php
namespace App\Repositories;
use App\Models\Gender;

class GenderRepository {
    public function get() {
        return Gender::all();
    }

    public function getGendersWithBooks() {
        $genders = Gender::with('books')->get();
        return $genders;
    }

    public function getById(int $id)
    {
        return Gender::findOrFail($id);
    }

    public function getBooksByGenderId(int $id)
    {
        $gender = $this->getById($id);
        return $gender->books;
    }

    public function createGender(array $data)
    {
        return Gender::create($data);
    }

    public function updateGender(int $id, array $data) {
        $gender = $this->getById($id);
        $gender->update($data);
        return $gender;
    }

    public function deleteGender(int $id) {
        $gender = $this->getById($id);
        $gender->delete();
        return $gender;
    }
}