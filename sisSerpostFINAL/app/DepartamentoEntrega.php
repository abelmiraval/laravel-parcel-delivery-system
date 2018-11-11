<?php
namespace sisSerpost;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class DepartamentoEntrega extends Model
{

    protected $table      = 'departamento_entrega';
    protected $primaryKey = 'iddepartamento_entrega';
    public $timestamps    = false; //esto es el autocompletador

    //eston van hacer los campos que van hacer rellenables
    protected $fillable = [
        'origen',
        'destino',

    ];

    protected $guarded = [
    ];

    
    public static function departamentosDestino($origen)
    {
        $destinos=DB::table('departamento_entrega as ce')
                      ->select('ce.iddepartamento_entrega','ce.destino','c.nombre as nombre_destino')
                      ->join('departamento as c','c.iddepartamento','=','ce.destino')
                      ->where('ce.origen','=',$origen)
                      ->orderBy('c.nombre')                     
                      ->get();
         return $destinos;         

    }     

}
