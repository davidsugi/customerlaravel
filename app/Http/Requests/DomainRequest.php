<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomainRequest extends FormRequest
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
            'name'=> 'required',
            'start'=>'required|date',
            'end'=>'required|date',
            'fee'=>'required|numeric',
            'renewal_fee'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'tolong isi nama domain!',
            'start.required' => 'tolong isi tanggal mulai aktif domain!',
            'end.required' => 'tolong isi tanggal selesai domain!',
            'fee.required' => 'tolong isi harga beli domain!',
            'renewal_fee.required' => 'tolong isi harga beli domain setelah promo!',
            'start.date' => 'Tanggal mulai beli domain tidak valid!',
            'end.date' => 'Tanggal selesai domain tidak valid!',
            'fee.numeric' => 'harga hanya boleh terdiri dari angka!',
            'renewal_fee.numeric' => 'harga pembaruan hanya boleh terdiri dari angka!',
        ];
    }
}
