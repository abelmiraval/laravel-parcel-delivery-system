<?php

namespace sisSerpost\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LiquidacionMoviliariaRequest extends FormRequest
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
            'pidpersona'           => 'required',
            'idcentro_poblado'=>'required',
            'cantidad'=>'required',
       
           

        ];
    }
}
