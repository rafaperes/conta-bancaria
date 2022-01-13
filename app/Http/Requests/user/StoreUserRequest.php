<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'      => 'required|max:50',
            'cpf'       => 'required|max:14|unique:users',
            'email'     => 'required|max:75|email|unique:users',
            'password'  => 'required|min:5|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function validationData()
    {
        $data = $this->all();

        $data['cpf'] = preg_replace('/[^0-9]/', '', $data['cpf']);

        return $data;
    }
}
