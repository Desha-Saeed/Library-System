<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatebooksRequest extends FormRequest
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
            // 'title' => 'required|max:30|unique:books,title'.$this->id,
            'title' => ['required','max:30', Rule::unique('books')->ignore($this->book)],
            'description' => 'required',
            'Image'=>'|image|size:40',
            'Category_id'=>'required',
            'Auther_id'=>'required'
        ];
    }
}
