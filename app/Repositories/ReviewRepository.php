<?php
namespace App\Repositories;
use App\Models\Review;

class ReviewRepository {
    public function get() {
        return Review::all();
    }

    public function getById(int $id)
    {
        return Review::findOrFail($id);
    }

    public function createReview(array $data)
    {
        return Review::create($data);
    }

    public function updateReview(int $id, array $data) {
        $review = $this->getById($id);
        $review->update($data);
        return $review;
    }

    public function deleteReview(int $id) {
        $review = $this->getById($id);
        $review->delete();
        return $review;
    }
}