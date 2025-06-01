<?php

namespace App\Services;

use App\Repositories\BookRepository;

class BookService
{
    private BookRepository $bookRepository;
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function get()
    {
        $books = $this->bookRepository->get();
        return $books;
    }

    public function getBooksWithDetails() {
        $books = $this->bookRepository->getBooksWithDetails();
        return $books;
    }

    public function getById(int $id)
    {
        return $this->bookRepository->getById($id);
    }

    public function getReviewsByBookId(int $id)
    {
        return $this->bookRepository->getReviewsByBookId($id);
    }

    public function createBook(array $data)
    {
        return $this->bookRepository->createBook($data);
    }

    public function updateBook(int $id, array $data) {
        return $this->bookRepository->updateBook($id, $data);
    }

    public function deleteBook(int $id) {
        return $this->bookRepository->deleteBook($id);
    }
}
