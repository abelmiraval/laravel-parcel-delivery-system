<?php

namespace sisSerpost;

use Illuminate\Database\Eloquent\Model;

class Peso extends Model
{
    protected $table      = 'peso';
    protected $primaryKey = 'idpeso';
    public $timestamps    = false;
    protected $fillable   = [
        'nombre',
        'minimo',
        'maximo',
        'fecha',
        'estado',

    ];

    protected $guarded = [

    ];

}
