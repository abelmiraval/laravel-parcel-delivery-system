<?php

namespace sisSerpost;

use Illuminate\Database\Eloquent\Model;
use DB;

class CentroPoblado extends Model
{
    protected $table='centro_poblado';
    protected $primaryKey='idcentro_poblado';
    public $timestamps=false;//esto es el autocompletador


    //eston van hacer los campos que van hacer rellenables
    protected $fillable=[
    	'iddistrito',
        'nombre',
        'importe'
    ];


    protected $guarded=[

    ];

    public static function liquidacionImporte($idcentro_poblado)
    {
        $importe=DB::table('centro_poblado')
                      ->select('importe')
                      ->where('idcentro_poblado','=',$idcentro_poblado)               
                      ->get();
         return $importe;         

    } 
}
