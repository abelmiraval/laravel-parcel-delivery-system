<?php

namespace sisSerpost\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use DateTime;

use sisSerpost\LiquidacionMoviliaria;
use sisSerpost\DetalleLiquidacionMoviliaria;
use Illuminate\Support\Facades\Redirect;
use sisSerpost\Http\Requests\LiquidacionMoviliariaRequest;



class LiquidacionMoviliariaController extends Controller
{
    
      public function __construct()
   {
        $this->middleware('auth');
   }
    
     public function index(Request $request)
    {
        if ($request) {
            $query  = trim($request->get('searchText'));
            $liquidaciones = DB::table('liquidacion_movilidad as lm')
                ->join('persona as p', 'p.idpersona', '=', 'lm.idpersona')
                ->join('detalle_liquidacion as dl', 'dl.idliquidacion_movilidad', '=', 'lm.idliquidacion_movilidad')
                ->join('centro_poblado as cp','cp.idcentro_poblado','dl.idcentro_poblado')

                ->select('lm.idliquidacion_movilidad', 'p.nombre', 'p.apell_paterno', 'p.apell_materno','p.inicio_contrato', 'p.fin_contrato','dl.fecha as inicio','lm.fecha as fin','lm.estado', 'lm.total')
                ->where('p.nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('lm.idliquidacion_movilidad', 'desc')
           
                ->groupBy('lm.idliquidacion_movilidad', 'p.nombre', 'p.apell_paterno', 'p.apell_materno','p.inicio_contrato', 'p.fin_contrato','dl.fecha','lm.fecha','lm.estado', 'lm.total')
                ->paginate(7);

            return view('personal.liquidacionMoviliaria.index', ["liquidaciones" => $liquidaciones, "searchText" => $query]);}

    }


    public function create(Request $request)
    {
        $personas = DB::table('persona as p')
            ->select('p.idpersona', DB::raw('CONCAT(p.apell_paterno," ",p.apell_materno," ",p.nombre) as trabajador'))
            ->where('p.tipo', '=', 'Trabajador')
            ->orderBy('p.apell_paterno','asc')
            ->get();


        $centro_poblados = DB::table('centro_poblado as cp')
            ->join('distrito as d','d.iddistrito','=','cp.iddistrito')
            ->select('d.nombre as origen','cp.nombre as destino','cp.idcentro_poblado')
            ->where('d.nombre','Tocache ')
            ->orderBy('d.nombre')
            ->get();

        return view("personal.liquidacionMoviliaria.create", ["personas" => $personas, "centro_poblados" => $centro_poblados]);

    }



    public function destroy($id){
        $liquidacion=LiquidacionMoviliaria::findOrFail($id);
        $liquidacion->estado='1';
        $mytime                             = Carbon::now('America/Lima');
        $liquidacion->fecha            = $mytime->toDateTimeString();   
        $liquidacion->update();
        return Redirect::to('personal/liquidacionMoviliaria');
    }


     public function show($idliquidacion_movilidad)
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

        return view("personal.liquidacionMoviliaria.show", ["liquidacion" => $liquidacion, "detalles" => $detalles]);

    }


     public function store(liquidacionMoviliariaRequest $request)
    {
        //try {
            
            DB::beginTransaction();
            $liquidacion                   = new LiquidacionMoviliaria;
            $liquidacion->idpersona        = $request->get('pidpersona');
            $liquidacion->estado           = '0';
            $liquidacion->save();

            $idcentro_poblado             = $request->get('idcentro_poblado');
            $cantidad               = $request->get('cantidad');
            $fecha                 = $request->get('fecha');
          
            $mytime                        = Carbon::now('America/Lima');
            

            $cont = 0;
            while ($cont < count($idcentro_poblado)) {
                $detalle                         = new DetalleLiquidacionMoviliaria;
                $detalle->idliquidacion_movilidad     = $liquidacion->idliquidacion_movilidad;

                $detalle->idcentro_poblado       = $idcentro_poblado[$cont];
                $detalle->cantidad             = $cantidad[$cont];
                $detalle->fecha                 = $mytime->toDateTimeString();  
                $detalle->cantidad               = $cantidad[$cont];
                $detalle->save();
                $cont = $cont + 1;

            }

            $liquidacion->total = $request->get('ptotal'); //(como se llama el objeto de validacion)
            $liquidacion->update();

            DB::commit();

       // } catch (\Exception $e) {
         //   DB::rollback();
       // }
        return Redirect::to('personal/liquidacionMoviliaria');
    }


    public function edit($idliquidacion_movilidad)
    {

        $liquidacion=liquidacionMoviliaria::findOrFail($idliquidacion_movilidad);
        $trabajador=DB::table('persona as p')
            ->join('liquidacion_movilidad as lm','lm.idpersona','=','p.idpersona')
            ->select('p.nombre as nombre_trabajador','p.apell_paterno','p.apell_materno')
           ->where('lm.idliquidacion_movilidad','=',$idliquidacion_movilidad)
            ->get();
        $centro_poblados = DB::table('centro_poblado as cp')
            ->join('distrito as d','d.iddistrito','=','cp.iddistrito')
            ->select('d.nombre as origen','cp.nombre as destino','cp.idcentro_poblado')
            ->orderBy('d.nombre')
            ->get();

        return view("personal.liquidacionMoviliaria.edit", ["liquidacion" => $liquidacion,"centro_poblados" => $centro_poblados,"trabajador" => $trabajador]);
    }

    public function update(LiquidacionMoviliariaRequest $request, $idliquidacion_movilidad)
    {

       DB::beginTransaction();
       
         $liquidacion=liquidacionMoviliaria::findOrFail($idliquidacion_movilidad);

         $idcentro_poblado       = $request->get('idcentro_poblado');
         $cantidad               = $request->get('cantidad');
         $fecha                  = $request->get('fecha');  
         $mytime                 = Carbon::now('America/Lima');
            

            $cont = 0;
            while ($cont < count($idcentro_poblado)) {
                $detalle                         = new DetalleLiquidacionMoviliaria;
                $detalle->idliquidacion_movilidad     = $liquidacion->idliquidacion_movilidad;

                $detalle->idcentro_poblado       = $idcentro_poblado[$cont];
                $detalle->cantidad             = $cantidad[$cont];
                $detalle->fecha                 = $mytime->toDateTimeString();  
                $detalle->cantidad               = $cantidad[$cont];
                $detalle->save();
                $cont = $cont + 1;

            }

            $liquidacion->total =$liquidacion->total + $request->get('ptotal'); //(como se llama el objeto de validacion)
            $liquidacion->update();
          
            DB::commit();
   
               return Redirect::to('personal/liquidacionMoviliaria');
    }
} 
