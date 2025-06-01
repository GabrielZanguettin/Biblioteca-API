<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Services\BookService;
use App\Http\Resources\BookResource;
use App\Http\Resources\ReviewResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    private BookService $bookService;
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function get() {
        $books = $this->bookService->get();
        return BookResource::collection($books);
    }

    public function getBooksWithDetails() {
        $books = $this->bookService->getBooksWithDetails();
        return BookResource::collection($books);
    }

    public function getById(int $id)
    {
        try {
            $book = $this->bookService->getById($id);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return new BookResource($book);
    }

    public function getReviewsByBookId(int $id) {
        try {
            $reviews = $this->bookService->getReviewsByBookId($id);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return ReviewResource::collection($reviews);
    }

    public function createBook(BookRequest $request)
    {
        $data = $request->validated();
        $book = $this->bookService->createBook($data);
        return new BookResource($book);
    }

    public function updateBook(int $id, BookUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            $book = $this->bookService->updateBook($id, $data);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return new BookResource($book);
    }

     public function deleteBook(int $id)
    {
        try {
            $book = $this->bookService->deleteBook($id);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return new BookResource($book);
    }
}
