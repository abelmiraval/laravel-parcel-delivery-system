<?php

namespace sisSerpost\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubTipoCorrespondenciaRequest extends FormRequest
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
            'idtipo_correspondencia'=>'required', 
            'nombre'=>'required|max:20',
            'descripcion'=>'required|max:45'

        ];
    }
}
