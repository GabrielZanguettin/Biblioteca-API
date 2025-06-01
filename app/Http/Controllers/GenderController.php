<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenderRequest;
use App\Services\GenderService;
use App\Http\Resources\GenderResource;
use App\Http\Resources\BookResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GenderController extends Controller
{
    private GenderService $genderService;
    public function __construct(GenderService $genderService)
    {
        $this->genderService = $genderService;
    }

    public function get() {
        $genders = $this->genderService->get();
        return GenderResource::collection($genders);
    }

    public function getGendersWithBooks() {
        $genders = $this->genderService->getGendersWithBooks();
        return GenderResource::collection($genders);
    }

    public function getById(int $id)
    {
        try {
            $gender = $this->genderService->getById($id);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Gender not found'], 404);
        }
        return new GenderResource($gender);
    }

    public function getBooksByGenderId(int $id)
    {
        try {
            $books = $this->genderService->getBooksByGenderId($id);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Gender not found'], 404);
        }
        return BookResource::collection($books);
    }

    public function createGender(GenderRequest $request)
    {
        $data = $request->validated();
        $gender = $this->genderService->createGender($data);
        return new GenderResource($gender);
    }

    public function updateGender(int $id, GenderRequest $request)
    {
        $data = $request->validated();
        try {
            $gender = $this->genderService->updateGender($id, $data);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Gender not found'], 404);
        }
        return new GenderResource($gender);
    }

     public function deleteGender(int $id)
    {
        try {
            $gender = $this->genderService->deleteGender($id);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Gender not found'], 404);
        }
        return new GenderResource($gender);
    }
}
