<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3','max:50'],
            'email' => ['required', 'string', 'email','max:100', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'surname'=>['nullable','string'],
            'age'=>['nullable','integer'],
            'address'=>['nullable','string'],
            'gender'=>['nullable','integer'],
            'role'=>['nullable','integer'],
        ];
    }
}
