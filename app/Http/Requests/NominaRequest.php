<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NominaRequest extends FormRequest
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

    public function messages()
{
    return [

        'code.required'              => 'El codigo es obligatorio.',
        'name.required'              => 'El nombre es obligatorio.',
        'second_last_name.required'  => 'El apellido materno es obligatorio.',
        'first_last_name.required'   => 'El apellido paterno es obligatorio.',
        'email.required'             => 'El email es obligatorio.',
        'contract_type.required'     => 'El tipo de contrato es obligatorio.',
        'status.required'            => 'El estatus es obligatorio.',

        'name.regex'                 => 'Solo se permite letras',
        'second_last_name.regex'     => 'Solo se permite letras',
        'first_last_name.regex'      => 'Solo se permite letras',

        'email.email'                => 'Email invalido',


    ];
}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code'             => 'required',
            'name'             => 'required|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/',
            'second_last_name' => 'required|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/',
            'first_last_name'  => 'required|regex:/^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$/',
            'email'            => 'required|email',
            'contract_type'    => 'required',
            'status'           => 'required',
        ];
    }
}
