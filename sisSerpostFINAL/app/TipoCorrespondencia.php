<?php

namespace sisSerpost;

use Illuminate\Database\Eloquent\Model;

class TipoCorrespondencia extends Model
{
     protected $table='tipo_correspondencia';
    protected $primaryKey='idtipo_correspondencia';

    public $timestamps=false;//esto es el autocompletador


    //eston van hacer los campos que van hacer rellenables
    protected $fillable=[
        'idtipo_correspondencia',
        'nombre',
        'descripcion'
    ];


    protected $guarded=[

    ];

}
