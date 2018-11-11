<?php

namespace sisSerpost\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoCorrespondenciaRequest extends FormRequest
{
      /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    //Esto es para permitir la validacion
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    //Esto es la funcion reglas que atributos vamos a validar
    public function rules()
    {
        return [
            'nombre'=>'required|max:20',
            'descripcion'=>'required|max:45'

        ];
    }
}
