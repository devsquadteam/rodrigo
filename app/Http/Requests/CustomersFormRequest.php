<?php

namespace Charlie\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomersFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:150',
            'city' => 'required|min:3|max:50',
            'birthdate' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo name é obrigatório',
            'city.required' => 'O campo city é obrigatório',
            'birthdate.required' => 'O campo birthdate é obrigatório',
        ];
    }
}
