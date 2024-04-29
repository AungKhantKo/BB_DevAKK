<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'You need to fill your name',
            'email.required'=>'You need to fill email addresspassword',
            'password.required'=>'You need to fill password',
            'role.required'=>'You need to choose role',
            
        ];
    }

}
