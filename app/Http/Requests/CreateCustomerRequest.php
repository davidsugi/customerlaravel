<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'name'=> 'required|min:2',
            'Addres'=>'required',
            'dob'=>'required|date',
            'phone'=>'required|integer',
            'email'=>'required|unique|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'tolong isi nama anda!',
            'Addres.required' => 'tolong isi alamat anda!',
            'dob.required' => 'tolong isi Tanggal lahir anda!',
            'phone.required' => 'tolong isi nomor telpon anda!',
            'email.required' => 'tolong isi email anda!',
            'dob.date' => 'Tanggal lahir yang anda masukan tidak valid!',
            'phone.integer' => 'Nomor telpon hanya boleh terdiri dari angka!',
            'email.unique' => 'Email yang anda masukan telah digunakan orang lain!',
            'email.email' => 'Format email yang anda masukan tidka valid!',
        ];
    }
}
