<?php

namespace App\Http\Requests\V1\auth;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthRequest extends FormRequest
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
        $path = $this->path();

        return [
            'name' => Rule::requiredIf($this->path() === "api/register"),
            'email'=>['required','email'],
            'password'=>['required']
        ];
    }
}
