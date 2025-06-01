<?php

namespace App\Services;

use App\Repositories\GenderRepository;

class GenderService
{
    private GenderRepository $genderRepository;
    public function __construct(GenderRepository $genderRepository)
    {
        $this->genderRepository = $genderRepository;
    }

    public function get()
    {
        $genders = $this->genderRepository->get();
        return $genders;
    }

    public function getGendersWithBooks()
    {
        $genders = $this->genderRepository->getGendersWithBooks();
        return $genders;
    }

    public function getById(int $id)
    {
        return $this->genderRepository->getById($id);
    }

    public function getBooksByGenderId(int $id)
    {
        return $this->genderRepository->getBooksByGenderId($id);
    }

    public function createGender(array $data)
    {
        return $this->genderRepository->createGender($data);
    }

    public function updateGender(int $id, array $data) {
        return $this->genderRepository->updateGender($id, $data);
    }

    public function deleteGender(int $id) {
        return $this->genderRepository->deleteGender($id);
    }
}
