<?php

namespace sisSerpost;

use Illuminate\Database\Eloquent\Model;

class DetalleLiquidacionMoviliaria extends Model
{
    protected $table      = 'detalle_liquidacion';
    protected $primaryKey = 'iddetalle_liquidacion';
    public $timestamps    = false; //esto es el autocompletador

    //eston van hacer los campos que van hacer rellenables
    protected $fillable = [

        'idliquidacion_moviliaria',
        'idzona',
        'cantidad',     
        'total'

    ];

    protected $guarded = [

    ];
}
