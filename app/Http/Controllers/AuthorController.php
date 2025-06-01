<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Http\Requests\AuthorRequest;
use App\Http\Requests\AuthorUpdateRequest;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\BookResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorController extends Controller
{
    private AuthorService $authorService;
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function get() {
        $authors = $this->authorService->get();
        return AuthorResource::collection($authors);
    }

    public function getAuthorsWithBooks() {
        $authors = $this->authorService->getAuthorsWithBooks();
        return AuthorResource::collection($authors);
    }

    public function getById(int $id)
    {
        try {
            $author = $this->authorService->getById($id);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        return new AuthorResource($author);
    }

    public function getBooksByAuthorId(int $id) {
        try{
            $books = $this->authorService->getBooksByAuthorId($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['error'=>'Author not found', 404]);
        }
        return BookResource::collection($books);
    }

    public function createAuthor(AuthorRequest $request)
    {
        $data = $request->validated();
        $author = $this->authorService->createAuthor($data);
        return new AuthorResource($author);
    }

    public function updateAuthor(int $id, AuthorUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            $author = $this->authorService->updateAuthor($id, $data);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        return new AuthorResource($author);
    }

     public function deleteAuthor(int $id)
    {
        try {
            $author = $this->authorService->deleteAuthor($id);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        return new AuthorResource($author);
    }
}
