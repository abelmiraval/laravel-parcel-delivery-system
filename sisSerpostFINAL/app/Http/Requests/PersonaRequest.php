<?php

namespace sisSerpost\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PersonaRequest extends FormRequest
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
            //son los nombres que tendran en nuestro formulario HTML
            'nombre'           => 'required|max:20',
            'apell_paterno'    => 'required|max:20',
            'apell_materno'    => 'required|max:20',
            'tipo_documento'   => 'required|max:20',
            'numero_documento' => 'required|max:15',
            'direccion'        => 'required|max:45',
            'telefono'         => 'max:15',

        ];
    }
}
