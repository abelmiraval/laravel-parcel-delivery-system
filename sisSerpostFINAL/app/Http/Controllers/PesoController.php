<?php

namespace sisSerpost\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use sisSerpost\Http\Requests\PesoRequest;
use sisSerpost\Peso;

class PesoController extends Controller
{
    public function __construct()
   {
        $this->middleware('auth');
   }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $pesos = DB::table('peso')->where('minimo', 'LIKE','%'. $query . '%')->where('estado', '=', '1')->orderBy('nombre', 'asc')->paginate(7);
            return view('tarifa.peso.index', ["pesos" => $pesos, "searchText" => $query]);
        }

    }
    public function create()
    {
        return view("tarifa.peso.create");

    }
    public function store(PesoRequest $request)
    {
        $peso         = new Peso;
        $peso->nombre = $request->get('nombre');
        $metrica1     = $request->get('metrica1');
        $peso->minimo = $request->get('minimo') . ' ' . $metrica1;
        $metrica2     = $request->get('metrica2');
        $peso->maximo = $request->get('maximo') . ' ' . $metrica2;
        $mytime       = Carbon::now('America/Lima');
        $peso->fecha  = $mytime->toDateTimeString();
        $peso->estado = '1';
        $peso->save();
        return Redirect::to('tarifa/peso');
    }

    public function show($idpeso)
    {
        return view("tarifa.peso.show", ["pesos" => Peso::findOrFail($idpeso)]);

    }

    public function edit($idpeso)
    {
        return view("tarifa.peso.edit", ["peso" => Peso::findOrFail($idpeso)]);
    }

    public function update(PesoRequest $request, $idpeso)
    {
        $peso         = Peso::findOrFail($idpeso);
        $peso->nombre = $request->get('nombre');
        $metrica1     = $request->get('metrica1');
        $peso->minimo = $request->get('minimo') . ' ' . $metrica1;
        $metrica2     = $request->get('metrica2');
        $peso->maximo = $request->get('maximo') . ' ' . $metrica2;
        $mytime       = Carbon::now('America/Lima');
        $peso->fecha  = $mytime->toDateTimeString();
        $peso->update();
        return Redirect::to('tarifa/peso');

    }

    public function destroy($idpeso)
    {
        $peso         = Peso::findOrFail($idpeso);
        $peso->estado = '0';
        $peso->update();
        return Redirect::to('tarifa/peso');
    }
}
