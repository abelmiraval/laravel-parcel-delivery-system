<?php

namespace sisSerpost\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use sisSerpost\Http\Requests\ZonaRequest;
use sisSerpost\Zona;

class ZonaController extends Controller
{
     public function __construct()
   {
        $this->middleware('auth');
   }
   

    public function index(Request $request)
    {
        if ($request) {

            $query = trim($request->get('searchText'));
            $zonas = DB::table('zona as z')
                ->join('departamento_entrega as ce', 'z.iddepartamento_entrega', '=', 'ce.iddepartamento_entrega')->join('departamento as c', 'ce.origen', '=', 'c.iddepartamento')
                ->join('departamento as cc', 'ce.destino', '=', 'cc.iddepartamento')
                ->join('peso as p', 'z.idpeso', '=', 'p.idpeso')->select('z.idzona', 'z.nombre', 'z.descripcion', 'c.nombre as origen', 'cc.nombre as destino', 'p.minimo as minimo', 'p.maximo as maximo', 'z.tarifa', 'z.fecha')
                ->where('z.nombre', 'LIKE', '%' . $query . '%')
                ->where('z.estado', '=', '1')
                ->orwhere('c.nombre', 'LIKE', '%' . $query . '%')
                ->where('z.estado', '=', '1')
                ->orderBy('c.nombre', 'asc')->paginate(10);

            return view('tarifa.zona.index', ["zonas" => $zonas, "searchText" => $query]);
        }

    }

    public function create()
    {

        $departamentos_entrega = DB::table('departamento_entrega as ce')->join('departamento as c', 'ce.origen', '=', 'c.iddepartamento')->join('departamento as cc', 'ce.destino', '=', 'cc.iddepartamento')->select('ce.iddepartamento_entrega', 'c.nombre as origen', 'cc.nombre as destino', 'ce.iddepartamento_entrega')->get();

        $pesos = DB::table('peso')->select('idpeso', 'minimo', 'maximo')->get();

        return view("tarifa.zona.create", ["departamentos_entrega" => $departamentos_entrega, "pesos" => $pesos]);

    }

    public function store(ZonaRequest $request) //almacena el objeto cliente en nuestra bd cliente

    {

        $zona                         = new Zona;
        $zona->nombre                 = $request->get('nombre');
        $zona->descripcion            = $request->get('descripcion');
        $zona->iddepartamento_entrega = $request->get('iddepartamento_entrega');
        $zona->idpeso                 = $request->get('idpeso');
        $zona->tarifa                 = $request->get('tarifa');
        $mytime                       = Carbon::now('America/Lima');
        $zona->fecha                  = $mytime->toDateTimeString();
        $zona->estado                 = '1';
        $zona->save();
        return Redirect::to('tarifa/zona');

    }

    public function show($idzona) //para mostrar

    {
        return view("tarifa.zona.show", ["zona" => Zona::findOrFail($idzona)]);

    }

    public function edit($idzona)
    {
        $zona                  = Zona::findOrFail($idzona);
        $departamentos_entrega = DB::table('departamento_entrega as ce')->join('departamento as c', 'ce.origen', '=', 'c.iddepartamento')->join('departamento as cc', 'ce.destino', '=', 'cc.iddepartamento')->select('ce.iddepartamento_entrega', 'c.nombre as origen', 'cc.nombre as destino', 'ce.iddepartamento_entrega')->get();

        $pesos = DB::table('peso')->select('idpeso', 'minimo', 'maximo')->get();

        return view("tarifa.zona.edit", ["zona" => $zona, "departamentos_entrega" => $departamentos_entrega, "pesos" => $pesos]);
    }

    public function update(ZonaRequest $request, $idzona)
    {

        $zona                         = Zona::findOrFail($idzona);
        $zona->nombre                 = $request->get('nombre');
        $zona->descripcion            = $request->get('descripcion');
        $zona->iddepartamento_entrega = $request->get('iddepartamento_entrega');
        $zona->idpeso                 = $request->get('idpeso');
        $zona->tarifa                 = $request->get('tarifa');
        $mytime                       = Carbon::now('America/Lima');
        $zona->fecha                  = $mytime->toDateTimeString();
        $zona->update();

        return Redirect::to('tarifa/zona');

    }

    public function destroy($idzona)
    {
        $zona         = Zona::findOrFail($idzona);
        $zona->estado = '0';
        $zona->update();
        return Redirect::to('tarifa/zona');
    }

    public function getDevolverTarifaZona(Request $request, $pdestino, $pzona, $pidpeso)
    {
        if ($request->ajax()) {
            $zona = Zona::devolverTarifaZona($pdestino, $pzona, $pidpeso);
            return response()->json($zona);
        }

    }

    public function devolverTarifa(Request $request)
    { 
        $data = Zona::tarifaZona($request->all());
        return response()->json($data); 
    }

}
