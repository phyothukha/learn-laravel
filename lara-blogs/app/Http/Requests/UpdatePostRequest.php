<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            "title" =>"required:string|min:3|unique:posts,title,". $this->route("post")->id,
            "category" => "required|exists:categories,id",
            "description" => "required|min:10",
            "photos.*" => "mimes:jpg,png|file|max:512",
            "featured_image" => "nullable|mimes:png,jpg|file|max:512",
        ];
    }
}
