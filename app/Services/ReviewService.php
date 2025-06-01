<?php

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService
{
    private ReviewRepository $reviewRepository;
    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function get()
    {
        $reviews = $this->reviewRepository->get();
        return $reviews;
    }

    public function getById(int $id)
    {
        return $this->reviewRepository->getById($id);
    }

    public function createReview(array $data)
    {
        return $this->reviewRepository->createReview($data);
    }

    public function updateReview(int $id, array $data) {
        return $this->reviewRepository->updateReview($id, $data);
    }

    public function deleteReview(int $id) {
        return $this->reviewRepository->deleteReview($id);
    }
}
