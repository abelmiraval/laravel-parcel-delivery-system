<?php

namespace sisSerpost\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use sisSerpost\DepartamentoEntrega;
use sisSerpost\Http\Requests\DepartamentoEntregaRequest;

class DepartamentoEntregaController extends Controller
{
   public function __construct()
   {
        $this->middleware('auth');
   }
    public function index(Request $request)
    {
        if ($request) {
            $query           = trim($request->get('searchText'));
            $departamento_entregas = DB::table('departamento_entrega as ce')
            ->join('departamento as c', 'ce.origen', '=', 'c.iddepartamento')
            ->join('departamento as cc', 'ce.destino', '=', 'cc.iddepartamento')
            ->select('c.nombre as origen', 'cc.nombre as destino', 'ce.iddepartamento_entrega')
            ->where('c.nombre', 'LIKE', $query . '%')   
            ->orderBy('c.nombre', 'asc')
            ->paginate(7);

            return view('tarifa.departamentoEntrega.index', ["departamento_entregas" => $departamento_entregas, "searchText" => $query]);
        }

    }

    public function create()
    {

        $departamentos = DB::table('departamento')
          ->where('iddepartamento','!=','1')
          ->get();
            
        return view("tarifa.departamentoEntrega.create", ["departamentos" => $departamentos]);

    }

    public function store(DepartamentoEntregaRequest $request)
    {

        $departamento                   = new DepartamentoEntrega;
        $departamento->iddepartamento_entrega = $request->get('iddepartamento_entrega');
        $departamento->origen    = $request->get('origen');
        $departamento->destino   = $request->get('destino');
        $departamento->save();

        return Redirect::to('tarifa/departamentoEntrega');

    }

    public function show($iddepartamento_entrega) //para mostrar

    {
        return view("tarifa.departamento.show", ["departamentoEntrega" => DepartamentoEntrega::findOrFail($iddepartamento_entrega)]);
        //muestra el cliente especifico findOrFail

    }

    public function edit($iddepartamento_entrega)
    {
        $departamentoEntrega  = DepartamentoEntrega::findOrFail($iddepartamento_entrega);
        $departamentos = DB::table('departamento')->get();

        return view("tarifa.departamentoEntrega.edit", ["departamentoEntrega" => $departamentoEntrega, "departamentos" => $departamentos]);
    }

    public function update(DepartamentoEntregaRequest $request, $iddepartamento_entrega)
    {
        $departamentoEntrega                 = DepartamentoEntrega::findOrFail($iddepartamento_entrega);
        $departamentoEntrega->origen  = $request->get('origen'); //(como se llama el objeto de validacion)
        $departamentoEntrega->destino = $request->get('destino');
        $departamentoEntrega->update();
        return Redirect::to('tarifa/departamentoEntrega');

    }

    public function destroy($iddepartamento_entrega)
    {
        $departamentoEntrega = DepartamentoEntrega::findOrFail($iddepartamento_entrega);
        $departamentoEntrega->delete();
        return Redirect::to('tarifa/departamentoEntrega');
    }

    public function getDepartamentosDestino(Request $request, $origen)
    {
        if ($request->ajax()) {
            $departamentosDestino = DepartamentoEntrega::departamentosDestino($origen);
            return response()->json($departamentosDestino);
        }
    }

}
