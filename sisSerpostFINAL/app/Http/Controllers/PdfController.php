<?php

namespace sisventas\Http\Controllers;

use Illuminate\Http\Request;
use sisventas\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use sisventas\DetalleEnvioEncomienda;
use sisventas\EnvioEncomienda;
use DB;

class PdfController extends Controller
{

      public function __construct()
   {
        $this->middleware('auth');
   }
  
    public function pdf($idenvio_encomienda)
    {
       
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

            $pdf=PDF::loadView('vista',['envio_encomienda'=>$envio_encomienda,'detalles'=>$detales]);

            return $pdf->download('envio-encomienda.pdf');

    } 


      public function crearPDF()
    {
        $idenvio_encomienda=16;
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

            $pdf=PDF::loadView('vista',['envio_encomienda'=>$envio_encomienda,'detalles'=>$detales]);

            return $pdf->download('envio-encomienda.pdf');

        
    }


   
}
