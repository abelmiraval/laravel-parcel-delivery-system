<?php

namespace sisSerpost;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //voy a deci a que tabla hace referencia este modelo

    protected $table      = 'persona';
    protected $primaryKey = 'idpersona';
    public $timestamps    = false; //que no se agreguen las columnas de creacion y actualizacion de registros

    //cuales son los campos que van a recibir valor para almacenar en la base de datos
    protected $fillable = [
        'tipo',
        'nombre',
        'apell_paterno',
        'apell_materno',
        'tipo_documento',
        'numero_documento',
        'direccion',
        'telefono',
        'inicio_contrato',
        'fin_contrato'
    ];

    //los campos guarded se van  especificar cuando no queremos que se asignen al modelo
    protected $guarded = [

    ];

}
