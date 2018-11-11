<?php

namespace sisSerpost\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Redirect; //vamos agregar el modelo (sisSerpost asi se llama el proyecto)
use sisSerpost\Http\Requests; //para hacer redirecciones
use sisSerpost\Http\Requests\CentroPobladoRequest;
use sisSerpost\CentroPoblado;

class CentroPobladoController extends Controller
{

      public function __construct()
   {
        $this->middleware('auth');
   }
     public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('searchText'));
            $centro_poblados = DB::table('centro_poblado as cp')
            ->join('distrito as d','d.iddistrito','=','cp.iddistrito')
            ->select('cp.idcentro_poblado','d.nombre as distrito','cp.nombre', 'cp.importe')
            ->where('cp.nombre', 'LIKE', $query . '%')
            ->orderBy('cp.nombre', 'asc')
            ->paginate(7);
            
            return view('personal.centroPoblado.index', ["centro_poblados" => $centro_poblados, "searchText" => $query]);
        }

    }

    public function create()
    {

        $distritos = DB::table('distrito')->get();
   
        return view("personal.centroPoblado.create", ["distritos" => $distritos]);

    }

    public function store(CentroPobladoRequest $request)
    {
        $centro_poblado         = new CentroPoblado;
        $centro_poblado->nombre = $request->get('nombre');
        $centro_poblado->iddistrito = $request->get('iddistrito');
        $centro_poblado->importe = $request->get('importe');
        $centro_poblado->save();
        return Redirect::to('personal/centroPoblado');

    }

    public function show($idcentro_poblado)
    {
        return view("personal.centroPoblado.show", ["centro_poblado" => CentroPoblado::findOrFail($idcentro_poblado)]);

    }

    public function edit($idcentro_poblado)

    {
         $distritos = DB::table('distrito')->get();
        return view("personal.centroPoblado.edit", ["centro_poblado" => CentroPoblado::findOrFail($idcentro_poblado),"distritos" => $distritos]);
    }

    public function update(CentroPobladoRequest $request, $idcentro_poblado)
    {
        $centro_poblado         = CentroPoblado::findOrFail($idcentro_poblado);
        $centro_poblado->nombre = $request->get('nombre'); //(como se llama el objeto de validacion)
        $centro_poblado->nombre = $request->get('iddistrito');
        $centro_poblado->nombre = $request->get('importe');
        $centro_poblado->update();
        return Redirect::to('personal/centroPoblado');

    }
    public function destroy($idcentro_poblado)
    {
        $centro_poblado = CentroPoblado::findOrFail($idcentro_poblado);
        $centro_poblado->delete();
        return Redirect::to('personal/centroPoblado');
    }

    function getLiquidacionImporte(Request $request,$idcentro_poblado){
       if ($request->ajax()) {
            $importe=CentroPoblado::liquidacionImporte($idcentro_poblado);
            return response()->json($importe);
    }

}
}
