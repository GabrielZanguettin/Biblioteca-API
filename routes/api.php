<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'get');
    Route::get('/authors/books', 'getAuthorsWithBooks');
    Route::get('/authors/{id}', 'getById');
    Route::get('/authors/{id}/books', 'getBooksByAuthorId');
    Route::post('/authors', 'createAuthor');
    Route::patch('/authors/{id}', 'updateAuthor');
    Route::delete('/authors/{id}', 'deleteAuthor');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'get');
    Route::get('/books/details', 'getBooksWithDetails');
    Route::get('/books/{id}', 'getById');
    Route::get('/books/{id}/reviews', 'getReviewsByBookId');
    Route::post('/books', 'createBook');
    Route::patch('/books/{id}', 'updateBook');
    Route::delete('/books/{id}', 'deleteBook');
});

Route::controller(GenderController::class)->group(function () {
    Route::get('/genders', 'get');
    Route::get('/genders/books', 'getGendersWithBooks');
    Route::get('/genders/{id}', 'getById');
    Route::get('/genders/{id}/books', 'getBooksByGenderId');
    Route::post('/genders', 'createGender');
    Route::patch('/genders/{id}', 'updateGender');
    Route::delete('/genders/{id}', 'deleteGender');
});

Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews', 'get');
    Route::get('/reviews/{id}', 'getById');
    Route::post('/reviews', 'createReview');
    Route::patch('/reviews/{id}', 'updateReview');
    Route::delete('/reviews/{id}', 'deleteReview');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'get');
    Route::get('/users/{id}', 'getById');
    Route::get('/users/{id}/reviews', 'getReviewsByUserId');
    Route::post('/users', 'createUser');
    Route::patch('/users/{id}', 'updateUser');
    Route::delete('/users/{id}', 'deleteUser');
});