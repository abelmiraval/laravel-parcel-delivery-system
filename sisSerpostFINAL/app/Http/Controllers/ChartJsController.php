<?php
namespace sisSerpost\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use sisSerpost\DetalleEnvioEncomienda;
use sisSerpost\EnvioEncomienda;
use sisSerpost\Http\Requests;
use sisSerpost\SubTipoCorrespondencia;

class ChartJsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
   public function __construct()
   {
        $this->middleware('auth');
   }
   
    public function graficoSubTipoCorrespondenciaCantidad(Request $request)
    {  
        $pastel = DB::table('detalle_envio_encomienda as de')
                  ->join('envio_encomienda as ec','ec.idenvio_encomienda','de.idenvio_encomienda')
                  ->join('sub_tipo_correspondencia as stc','stc.idsub_tipo_correspondencia', '=', 'de.idsub_tipo_correspondencia')
                  ->select('stc.nombre',DB::raw('COUNT(de.idsub_tipo_correspondencia) as cantidad')) 
                  ->groupBy('stc.nombre') 
                  ->get();

        return view('grafico.graficoEncomiendaNode.node-chart',['pastel'=>$pastel]); 
    }

    public function grafico()
    {  
        $pastel = DB::table('detalle_envio_encomienda as de')
                  ->join('envio_encomienda as ec','ec.idenvio_encomienda','de.idenvio_encomienda')
                  ->join('sub_tipo_correspondencia as stc','stc.idsub_tipo_correspondencia', '=', 'de.idsub_tipo_correspondencia')
                  ->select('stc.nombre',DB::raw('COUNT(de.idsub_tipo_correspondencia) as cantidad'))
              ->whereBetween('ec.fecha',array($request->get('pfecha-inicial'),$request->get('pfecha-final')))
                  ->groupBy('stc.nombre') 
                  ->get();

        return view('grafico.graficoEncomiendaNode.node-chart',['pastel'=>$pastel]); 
    }


    public function devolverFechaGraficoSub(Request $request)
    {  
        $data = SubTipoCorrespondencia::fechaGraficoSub($request->all());
        return response()->json($data); 
    }
    
}
