<?php

namespace sisSerpost;

use Illuminate\Database\Eloquent\Model;
use DB;


class Zona extends Model
{
    protected $table      = 'zona';
    protected $primaryKey = 'idzona';
    public $timestamps    = false;
    protected $fillable   = [
        'nombre',
        'descripcion',
        'iddepartamento_entrega',
        'idpeso',
        'tarifa',
        'fecha',
        'estado',

    ];



    protected $guarded = [

    ];

    public static function devolverTarifaZona($pdestino,$pnombre,$pidpeso)
    {
        $zona=DB::table('zona')
                      ->select('idzona','tarifa')
                      //->join('departamento_entrega as ce','ce.pdestino','=',$pdestino)
                      //->join('peso as p','p.idpeso','=',$idpeso)
                      ->where('destino','=',$pdestino)
                      ->where('nombre','=',$pnombre)
                      ->where('idpeso','=',$pidpeso)                    
                      ->get();
         return $zona;         

    } 

    public static function tarifaZona($data){ 
    $destino= $data['destino'];
    $zona= $data['zona'];
    $peso= $data['peso'];

   $zona=DB::table('zona')
                      ->select('idzona','tarifa')
                      //->join('departamento_entrega as ce','ce.iddepartamento_entrega','=',$iddepartamento_entrega)
                      //->join('peso as p','p.idpeso','=',$idpeso)
                      ->where('iddepartamento_entrega',$destino)
                      ->where('nombre',$zona)
                      ->where('idpeso',$peso) 
                      ->where('estado',1)     
                      ->get();
         return $zona;  
    }


}
