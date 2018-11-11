<?php

namespace sisSerpost;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table='departamento';
    protected $primaryKey='iddepartamento';
    public $timestamps=false;//esto es el autocompletador


    //eston van hacer los campos que van hacer rellenables
    protected $fillable=[
        'nombre'
    ];


    protected $guarded=[

    ];

  
}
