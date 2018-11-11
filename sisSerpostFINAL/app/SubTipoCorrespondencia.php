<?php

namespace sisSerpost;
use DB;
use Illuminate\Database\Eloquent\Model;

class SubTipoCorrespondencia extends Model
{
    protected $table      = 'sub_tipo_correspondencia';
    protected $primaryKey = 'idsub_tipo_correspondencia';

    public $timestamps = false; //esto es el autocompletador

    //eston van hacer los campos que van hacer rellenables
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    protected $guarded = [

    ];

    //esto es un funcion estatica el cual le pasamos el id tipo de correspondencia
    public static function subCorrespondencias($id)
    {
        return SubTipoCorrespondencia::where('idtipo_correspondencia', '=', $id)
            ->get();
    }

    public static function fechaGraficoSub($data){ 
    
    $inicial= $data['fecha-inicial'];
    $final= $data['fecha-final'];

    $pastel = DB::table('detalle_envio_encomienda as de')
                  ->join('envio_encomienda as ec','ec.idenvio_encomienda','de.idenvio_encomienda')
                  ->join('sub_tipo_correspondencia as stc','stc.idsub_tipo_correspondencia', '=', 'de.idsub_tipo_correspondencia')
                  ->select('stc.nombre',DB::raw('COUNT(de.idsub_tipo_correspondencia) as cantidad'))
                  ->whereBetween('ec.fecha',array($inicial,$final))
                  ->groupBy('stc.nombre') 
                  ->get();

          return view('grafico.graficoEncomiendaNode.node-chart',['pastel'=>$pastel]);   
    }


    

}
