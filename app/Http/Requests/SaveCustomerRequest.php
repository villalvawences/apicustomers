<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCustomerRequest extends FormRequest
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
            'dni' => 'required|unique:customers,dni',
            'id_reg' => 'required',
            'id_com' => 'required',
            'email' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'date_reg' => 'required',
            'status' => 'required',
            'deleted' => 'required'
        ];
    }
}
