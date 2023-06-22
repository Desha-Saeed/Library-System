<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorebooksRequest extends FormRequest
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
            'title' => 'required|unique:books|max:30',
            'description' => 'required',
            'Image'=>'required|image',
            // 'Image'=>'required|image|size:10000',
            'Category_id'=>'required',
            'Auther_id'=>'required'
        ];
    }
}
