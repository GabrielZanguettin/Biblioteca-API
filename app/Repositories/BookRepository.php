<?php
namespace App\Repositories;
use App\Models\Book;

class BookRepository {
    public function get() {
        return Book::all();
    }

    public function getBooksWithDetails()
    {
        return Book::with(['reviews', 'author', 'gender'])->get();
    }

    public function getById(int $id)
    {
        return Book::findOrFail($id);
    }

    public function getReviewsByBookId(int $id)
    {
        $book = Book::with('reviews')->findOrFail($id);
        return $book->reviews;
    }

    public function createBook(array $data)
    {
        return Book::create($data);
    }

    public function updateBook(int $id, array $data) {
        $book = $this->getById($id);
        $book->update($data);
        return $book;
    }

    public function deleteBook(int $id) {
        $book = $this->getById($id);
        $book->delete();
        return $book;
    }
}