<?php

namespace sisSerpost;

use Illuminate\Database\Eloquent\Model;

class LiquidacionMoviliaria extends Model
{
    protected $table      = 'liquidacion_movilidad';
    protected $primaryKey = 'idliquidacion_movilidad';
    public $timestamps    = false; //esto es el autocompletador

    //eston van hacer los campos que van hacer rellenables
    protected $fillable = [

        'idpersona',
        'estado',
        'total',
        'fecha',  

    ];

    protected $guarded = [

    ];
}
