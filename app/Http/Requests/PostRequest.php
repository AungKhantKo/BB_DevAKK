<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'=>'required',
            'image'=>'required',
            'user_id'=>'required',
            'category_id'=>'required',
            'description'=>'required',
        ];
    }

    public function messages()
    {
        return[
            'title.required'=>'You need to fill post title',
            'image.required'=>'You need to fill post image',
            'user_id.required'=>'You need to fill post user_id',
            'category_id.required'=>'You need to choose category',
            'description.required'=>'You need to fill post description',
        ];
    }

}
