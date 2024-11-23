<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            "title" => "required|unique:posts,title|min:3",
            "category" => "required|exists:categories,id",
            "photos" => "required",
//            "photos.*" => "mimes:jpeg,png|file|max:512",
            "photos.*" => "mimes:jpg,png|file|max:1024",
            "description" => "required|min:10",
            "featured_image" => "nullable|mimes:png,jpg|file|max:512",
        ];
    }
}
