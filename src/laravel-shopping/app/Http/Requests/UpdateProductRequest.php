<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'name' => 'required|string|max:16',
            'price' => 'required|numeric',
            'path' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
