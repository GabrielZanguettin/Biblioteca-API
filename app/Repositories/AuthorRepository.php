<?php
namespace App\Repositories;
use App\Models\Author;

class AuthorRepository {
    public function get() {
        return Author::all();
    }

    public function getAuthorsWithBooks() {
        $authors = Author::with('books')->get();
        return $authors;
    }

    public function getById(int $id)
    {
        return Author::findOrFail($id);
    }

    public function getBooksByAuthorId(int $id) {
        $author = $this->getById($id);
        return $author->books;
    }

    public function createAuthor(array $data)
    {
        return Author::create($data);
    }

    public function updateAuthor(int $id, array $data) {
        $author = $this->getById($id);
        $author->update($data);
        return $author;
    }

    public function deleteAuthor(int $id) {
        $author = $this->getById($id);
        $author->delete();
        return $author;
    }
}