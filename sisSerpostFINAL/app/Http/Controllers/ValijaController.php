<?php

namespace sisSerpost\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use sisSerpost\Http\Requests\ValijaRequest;
use sisSerpost\Valija;
use sisSerpost\DetalleValija;
use sisSerpost\EnvioEncomienda;
use sisSerpost\DetalleEnvioEncomienda;
use sisSerpost\Http\Requests\EnvioEncomiendaRequest;


class ValijaController extends Controller
{
    public function __construct()
   {
        $this->middleware('auth');
   }

    public function index(Request $request)
    {
        if ($request) {
            $query   = trim($request->get('searchText'));
            $valijas = DB::table('valija')
             
            ->select('idvalija','fecha','descripcion','estado',DB::raw('LPAD(idvalija,7,0) as idvalija'))
            ->where('idvalija', 'LIKE', $query . '%')
            ->groupBy('idvalija','fecha','descripcion','estado')
            ->orderBy('idvalija', 'desc')->paginate(7);
            return view('envio.valija.index', ["valijas" => $valijas, "searchText" => $query]);
        }

    }

    public function create()
    {
            $valija=DB::table('valija as v')
            ->select('v.descripcion',DB::raw('LPAD(MAX(v.idvalija)+1,7,0) as maximo'))
            ->orderBy('v.idvalija','desc')
            ->get();

            $destinos=DB::table('departamento_entrega as de')
            ->select('de.iddepartamento_entrega','di.nombre as destino_departamento')
            ->join('departamento as d','d.iddepartamento','de.origen')
            ->join('departamento as di','di.iddepartamento','de.destino')
            ->where('d.nombre','=','Tocache')
            ->get();

            $envio_encomiendas=DB::table('envio_encomienda as ec')
            ->select('ec.codigo','ec.idenvio_encomienda', DB::raw('LPAD(ec.serie,4,0) as serie'),DB::raw('LPAD(ec.correlativo,7,0) as correlativo'))
            ->where('ec.estado','=','16')
            ->groupBy('ec.idenvio_encomienda')
            ->get();

            // el estado sea diferente al destino
            //si el destino es igual al estado que ya no lo muestre en el combo box dinamica por que ya llego el paquete a su destino entonces ya no necesitamos mostrarlo ahi asi entoncs 
        
        return view("envio.valija.create",["destinos" => $destinos,"envio_encomiendas" => $envio_encomiendas,"valija"=>$valija]);

    }

    public function store(ValijaRequest $request)
    {
        
         DB::beginTransaction();
            $valija              = new Valija;
            $valija->descripcion = $request->get('descripcion');
            $valija->estado = $request->get('estado');
            $mytime                             = Carbon::now('America/Lima');
            $valija->fecha            = $mytime->toDateTimeString();
            $valija->save();


            $idenvio_encomienda             = $request->get('idenvio_encomienda');
           
            
            $iddepartamento_entrega               = $request->get('iddepartamento_entrega');
            

            $cont = 0;
            while ($cont < count($idenvio_encomienda)) {
                $detalle                         = new DetalleValija;
                $detalle->idvalija     = $valija->idvalija;

                $detalle->idenvio_encomienda       = $idenvio_encomienda[$cont];
                 if ($valija->estado=='A') {
                   $encomienda              = EnvioEncomienda::findOrFail($idenvio_encomienda[$cont]);
                   $encomienda->estado='A';
                   $encomienda->update();
                }else{
                    if ($valija->estado=='1') {
                           $encomienda              = EnvioEncomienda::findOrFail($idenvio_encomienda[$cont]);
                           $encomienda->estado='1';
                           $encomienda->update();
                    }
                }
            
                $detalle->iddepartamento_entrega   = $iddepartamento_entrega[$cont];
                $detalle->save();
                $cont = $cont + 1;

            }

            DB::commit();




        return Redirect::to('envio/valija');

    }

    public function show($idvalija)
    {
         $valija = DB::table('valija')
            ->select(DB::raw('LPAD(idvalija,7,0) as idvalija'))
            ->where('idvalija', '=', $idvalija) 
            ->first();//esto es importante

         $detalles = DB::table('detalle_valija as dv')
            ->join('envio_encomienda as ec','ec.idenvio_encomienda','=','dv.idenvio_encomienda')   
            ->join('persona as p','p.idpersona','=','ec.idpersona')
            ->join('departamento_entrega as de', 'de.iddepartamento_entrega', '=', 'dv.iddepartamento_entrega')
            ->join('departamento as d', 'd.iddepartamento', '=', 'de.origen')
            ->join('departamento as di', 'di.iddepartamento', '=', 'de.destino')
            
            ->select('ec.idenvio_encomienda','ec.codigo','d.nombre as origen', 'di.nombre as destino',DB::raw('LPAD(ec.serie,4,0) as serie'),DB::raw('LPAD(ec.correlativo,7,0) as correlativo'))
            ->where('dv.idvalija', '=', $idvalija)
          //  ->groupBy('ec.idenvio_encomienda','d.nombre as origen', 'di.nombre as destino') 
            ->get();

        return view("envio.valija.show", ["valija" => $valija, "detalles" => $detalles]);

    }

    public function edit($idvalija)
    {
        return view("envio.valija.edit", ["valija" => Valija::findOrFail($idvalija)]);
    }

    public function enviandoEncomienda(ValijaRequest $request, $idvalija)
    {
        $valija              = Valija::findOrFail($idvalija);
        $mytime                             = Carbon::now('America/Lima');
        $valija->fecha            = $mytime->toDateTimeString();
        $valija->estado='1';
        $valija->update();



        $encomienda              = EnvioEncomienda::findOrFail($valija->idenvio_encomienda);
        $encomienda->estado='1';

        return Redirect::to('envio/valija');

    }
    public function destroy($iddepartamento_entrega)
    {
       // $valija = Valija::findOrFail($idvalija);
       // $valija->delete();
        return Redirect::to('envio/valija');
    }
}
