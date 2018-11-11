<?php
namespace sisSerpost\Http\Controllers;
use Illuminate\Http\Request;
use sisventas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sisventas\DetalleEnvioEncomienda;
use sisventas\EnvioEncomienda;
use sisSerpost\Http\Requests\EnvioEncomiendaRequest;
use DB;
use PDF;

class InvoiceController extends Controller
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


        if ($envio_encomienda->tipo_comprobante=='F') {
              $invoice_name = sprintf('F: %s.pdf', $envio_encomienda->serie." - ".$envio_encomienda->correlativo);
        }else{
            if ($envio_encomienda->tipo_comprobante=='B') {
                  $invoice_name = sprintf('B: %s.pdf', $envio_encomienda->numero_boleta);
            }
        }
      
        // sprintf('comprobante-%s.pdf', str_pad ($envio_encomienda->idenvio_encomienda, 7, '0', STR_PAD_LEFT));

        $pdf = PDF::loadView('invoice.pdf', ['envio_encomienda' => $envio_encomienda,'detalles'=>$detalles]);

        return $pdf->download($invoice_name);
    }

     public function pdf1($idliquidacion_movilidad)

    {

           $liquidacion = DB::table('liquidacion_movilidad as lm')

            ->join('persona as p', 'p.idpersona', '=', 'lm.idpersona')
            ->join('detalle_liquidacion as dl','dl.idliquidacion_movilidad','=','lm.idliquidacion_movilidad')
            ->select('lm.idliquidacion_movilidad','lm.estado', 'lm.total',DB::raw('CONCAT(p.nombre," ",p.apell_paterno," ",p.apell_materno) as nombre_trabajador'))
            ->where('lm.idliquidacion_movilidad', '=', $idliquidacion_movilidad)

            ->first(); 

        $detalles = DB::table('detalle_liquidacion as dl')
            ->join('centro_poblado as cp', 'cp.idcentro_poblado', '=', 'dl.idcentro_poblado')
            ->join('distrito as d','d.iddistrito','cp.iddistrito')

            ->select('dl.fecha','d.nombre as origen','cp.nombre as destino','dl.cantidad', 'cp.importe')
            ->where('dl.idliquidacion_movilidad', '=', $idliquidacion_movilidad)
            ->get();

              $pdf = PDF::loadView('invoice1.pdf1', ['liquidacion' => $liquidacion,'detalles'=>$detalles]);

        return $pdf->download('invoice_name.pdf');

    }
}
