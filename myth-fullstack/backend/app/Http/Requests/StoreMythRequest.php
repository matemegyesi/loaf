<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMythRequest extends FormRequest
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
            'name'          => ['required', 'string','max:100'],
            'desc'          => ['required', 'string'],
            'habitat_id'    => ['required', 'integer', 'exists:habitats,id'],
            'size_id'       => ['required', 'integer', 'exists:sizes,id'],
            'elements.*'    => ['exists:elements,id'],
            'image_id'      => ['required', 'integer', 'exists:images,id'],
        ];
    }
}
