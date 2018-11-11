<?php

namespace sisSerpost;

use Illuminate\Database\Eloquent\Model;

class DetalleEnvioEncomienda extends Model
{
    protected $table      = 'detalle_envio_encomienda';
    protected $primaryKey = 'iddetalle';
    public $timestamps    = false; //esto es el autocompletador

    //eston van hacer los campos que van hacer rellenables
    protected $fillable = [

        'idenvio_encomienda',
        'idsub_tipo_correspondencia',
        'consignado',
        'idzona',
        'cantidad',
        'descripcion',
      

    ];

    protected $guarded = [

    ];

}
