<?php

namespace sisSerpost;

use Illuminate\Database\Eloquent\Model;

class DetalleValija extends Model
{
	protected $table      = 'detalle_valija';
    protected $primaryKey = 'iddetalle_valija';
    public $timestamps    = false; //esto es el autocompletador

    //eston van hacer los campos que van hacer rellenables
    protected $fillable = [

        'idvalija',
        'idenvio_encomienda',
        'iddepartamento_entrega',

    ];

    protected $guarded = [

    ];
}
