<?php

namespace App\Http\Requests\V1\todo;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
        $method = $this->method();
        $validRules = ['required'];
        if($method === 'PATCH') $validRules = array_merge(['sometimes'],$validRules);
        return [
            'title'=> $validRules,
            'description' => $validRules
        ];
    }

    protected function passedValidation(){

        $this->merge([
            'user_id' => $this->user()->id
        ]);
    }
}
