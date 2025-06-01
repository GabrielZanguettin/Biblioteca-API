<?php

namespace App\Services;

use App\Repositories\AuthorRepository;

class AuthorService
{
    private AuthorRepository $authorRepository;
    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function get()
    {
        $authors = $this->authorRepository->get();
        return $authors;
    }

    public function getById(int $id)
    {
        return $this->authorRepository->getById($id);
    }

    public function getAuthorsWithBooks() {
        return $this->authorRepository->getAuthorsWithBooks();
    }

    public function getBooksByAuthorId(int $id) {
        return $this->authorRepository->getBooksByAuthorId($id);
    }

    public function createAuthor(array $data)
    {
        return $this->authorRepository->createAuthor($data);
    }

    public function updateAuthor(int $id, array $data) {
        return $this->authorRepository->updateAuthor($id, $data);
    }

    public function deleteAuthor(int $id) {
        return $this->authorRepository->deleteAuthor($id);
    }
}
