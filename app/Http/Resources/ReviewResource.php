<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BookResource;
use App\Http\Resources\UserResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'note' => $this->note,
            'text' => $this->text,
            'user_id' => $this->user_id,
            'book_id' => $this->book_id,
            'book' => new BookResource($this->whenLoaded('book')),
            'user' => new UserResource($this->whenLoaded('user'))
        ];
    }
}
