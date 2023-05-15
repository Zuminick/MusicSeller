<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'integer'
            ],
            'artist' => [
                'required',
                'string'
            ],
            'name' => [
                'required',
                'string'
            ],
            'genre_id'=>[
                'required'
            ],
            'type_id' => [
                'required',
                'integer'
            ],
            'release_year' => [
                'required',
                'integer'
            ],
            'creation_year' => [
                'required',
                'integer'
            ],
            'description' => [
                'max:255'
            ],
            'status' => [
                'integer',
            ],
            'price' => [
                'required',
                'integer'
            ],
            'image' => [
                'required'
            ]
        ];
    }
}
