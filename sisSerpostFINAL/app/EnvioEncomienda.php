<?php

namespace sisSerpost;

use Illuminate\Database\Eloquent\Model;
use DB;
use PDF;
use sisSerpost\DetalleEnvioEncomienda;
class EnvioEncomienda extends Model
{
    protected $table      = 'envio_encomienda';
    protected $primaryKey = 'idenvio_encomienda';
    public $timestamps    = false; //esto es el autocompletador

    //eston van hacer los campos que van hacer rellenables
    protected $fillable = [
        'idpersona',
        'tipo_comprobante',
        'fecha',
        'serie',
        'correlativo',
        'numero_boleta',
        'total',
        'igv',
        'estado',
        'codigo'

    ];

    protected $guarded = [

    ];


    public static function comprobanteFactura($tipo_comprobante)
    {
        if ($tipo_comprobante=='F') {
             return EnvioEncomienda::select('tipo_comprobante', DB::raw('LPAD(MAX(correlativo)+1,7,0) as correlativo'), DB::raw('LPAD(MAX(serie),4,0) as serie'))
                               ->where('tipo_comprobante','=',$tipo_comprobante)
                               ->groupBy('tipo_comprobante')
                               ->get();
        }else{
            if ($tipo_comprobante=='B') {
             return EnvioEncomienda::select('tipo_comprobante', DB::raw('LPAD(MAX(numero_boleta)+1,7,0) as numero_boleta'))
                               ->where('tipo_comprobante','=',$tipo_comprobante)
                               ->groupBy('tipo_comprobante')
                               ->get();
            }                 
        }
      
    }

    public static function crearReporteEncomienda($data)
    {

        $idenvio_encomienda= $data['idenvio_encomienda'];
        $envio_encomienda = DB::table('envio_encomienda as ec')

            ->join('persona as p', 'ec.idpersona', '=', 'p.idpersona')
            ->join('detalle_envio_encomienda as de', 'ec.idenvio_encomienda', '=', 'de.idenvio_encomienda')
            ->join('zona as z', 'z.idzona', '=', 'de.idzona')


            ->select('ec.idenvio_encomienda', 'ec.fecha', 'p.nombre as nombre_cliente', 'ec.tipo_comprobante','ec.igv', 'ec.estado', 'ec.total', DB::raw('LPAD(ec.serie,4,0) as serie'),DB::raw('LPAD(ec.correlativo,7,0) as correlativo'),DB::raw('LPAD(ec.numero_boleta,7,0) as numero_boleta'))
            ->where('ec.idenvio_encomienda', '=', $idenvio_encomienda)
        //->groupBy('ec.idenvio_encomienda', 'ec.fecha', 'p.nombre', 'ec.tipo_comprobante', 'ec.serie', 'ec.correlativo', 'ec.igv');
            ->first(); //como es un solo ingreso no necesitamos agrupar

        $detalles = DB::table('detalle_envio_encomienda as de')

            ->join('sub_tipo_correspondencia as stc', 'stc.idsub_tipo_correspondencia', '=', 'de.idsub_tipo_correspondencia')
            ->join('zona as z', 'z.idzona', '=', 'de.idzona')
            ->join('departamento_entrega as ce', 'ce.iddepartamento_entrega', '=', 'z.iddepartamento_entrega')
            ->join('departamento as c', 'c.iddepartamento', '=', 'ce.origen')
            ->join('departamento as ci', 'ci.iddepartamento', '=', 'ce.destino')
            ->join('peso as p', 'p.idpeso', '=', 'z.idpeso')

            ->select('de.consignado', 'de.descripcion', 'stc.nombre as nombre_correspondencia', 'c.nombre as origen', 'ci.nombre as destino', 'z.nombre', 'p.minimo', 'p.maximo', 'z.tarifa', 'de.cantidad')
            ->where('de.idenvio_encomienda', '=', $idenvio_encomienda)
            ->get();

       $pdf=PDF::loadView('envio-encomienda-pdf',['envio_encomienda'=>$envio_encomienda,'detalles'=>$detalles]);

           //  $pdf=PDF::loadView('vista');
        return $pdf->download('envio-encomienda.pdf');

    }

    public static function buscarUbicacion($data){ 
    $codigo= $data['codigo'];
   $envio_encomienda=DB::table('envio_encomienda as ec')
                      ->join('departamento as d','d.iddepartamento','ec.estado')
                      ->select('d.nombre as estado')
                      ->where('ec.codigo',$codigo)   
                      ->get();
         return $envio_encomienda;  
    }


}
