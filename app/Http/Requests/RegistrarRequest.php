<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarRequest extends FormRequest
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
            'registrar'=> 'required',
            'username'=>'required',
            'password'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'registrar.required' => 'tolong isi nama registrar!',
            'username.required' => 'tolong isi username untuk registrar bersangkutan!',
            'password.required' => 'tolong isi password untuk registrar bersangkutan!',
        ];
    }
}
