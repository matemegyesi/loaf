<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreImageRequest extends FormRequest
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
            'name' => 'required|string|max:255', 
            'type' => 'required|string|in:image/jpeg,image/png,image/gif',
            'original' => 'required|file|mimes:jpeg,png,gif|max:10240',
            'category' => 'required|string|max:50',
            'preview' => 'nullable|file|mimes:jpeg,png,gif|max:10240',
        ];
    }
}
