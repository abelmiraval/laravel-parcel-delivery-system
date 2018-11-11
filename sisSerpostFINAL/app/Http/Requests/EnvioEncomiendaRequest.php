<?php

namespace sisSerpost\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnvioEncomiendaRequest extends FormRequest
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
            'pidpersona'              => 'required',
            'ptipo_comprobante'       => 'required|max:1',
            //'fecha'                  => 'required',
            // 'pserie'                  => 'required',
            'pcorrelativo'            => 'required',
            //'numero_boleta'      =>  'required|max:7',
            'idsub_tipo_correspondencia' => 'required',
            'consignado'             => 'required|max:45',
            'zona'                 => 'required',
            'cantidad'               => 'required',
            'descripcion'            => 'required|max:45',
            //'pestado'                 => 'required',

        ];
    }
}
