<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'note' => 'sometimes|required|integer|min:0|max:5',
           'text' => 'sometimes|required|string',
           'user_id' => 'sometimes|required|exists:users,id',
           'book_id' => 'sometimes|required|exists:books,id',
        ];
    }
}
