<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Requests\ReviewUpdateRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReviewController extends Controller
{
    private ReviewService $reviewService;
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function get() {
        $reviews = $this->reviewService->get();
        return ReviewResource::collection($reviews);
    }

    public function getById(int $id)
    {
        try {
            $review = $this->reviewService->getById($id);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        return new ReviewResource($review);
    }

    public function createReview(ReviewRequest $request)
    {
        $data = $request->validated();
        $review = $this->reviewService->createReview($data);
        return new ReviewResource($review);
    }

    public function updateReview(int $id, ReviewUpdateRequest $request)
    {
        $data = $request->validated();
        try {
            $review = $this->reviewService->updateReview($id, $data);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        return new ReviewResource($review);
    }

     public function deleteReview(int $id)
    {
        try {
            $review = $this->reviewService->deleteReview($id);
        }
        catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        return new ReviewResource($review);
    }
}
