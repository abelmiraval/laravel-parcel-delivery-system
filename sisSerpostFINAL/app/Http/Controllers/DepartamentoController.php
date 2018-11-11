<?php

namespace sisSerpost\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use sisSerpost\Departamento;
use sisSerpost\Http\Requests\DepartamentoRequest;

class DepartamentoController extends Controller
{
  public function __construct()
{
    $this->middleware('auth');
}

    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('searchText'));
            $departamentos = DB::table('departamento')
            ->where('nombre', 'LIKE', $query . '%')
            ->where('iddepartamento','!=','1')
            ->orderBy('nombre', 'asc')
            ->paginate(7);
            
            return view('tarifa.departamento.index', ["departamentos" => $departamentos, "searchText" => $query]);
        }

    }

    public function create()
    {

        return view("tarifa.departamento.create");

    }

    public function store(DepartamentoRequest $request)
    {
        $departamento         = new Departamento;
        $departamento->nombre = $request->get('nombre');
        $departamento->save();
        return Redirect::to('tarifa/departamento');

    }

    public function show($iddepartamento)
    {
        return view("tarifa.departamento.show", ["departamento" => Departamento::findOrFail($iddepartamento)]);

    }

    public function edit($iddepartamento)
    {
        return view("tarifa.departamento.edit", ["departamento" => departamento::findOrFail($iddepartamento)]);
    }

    public function update(DepartamentoRequest $request, $iddepartamento)
    {
        $departamento         = Departamento::findOrFail($iddepartamento);
        $departamento->nombre = $request->get('nombre'); //(como se llama el objeto de validacion)
        $departamento->update();
        return Redirect::to('tarifa/departamento');

    }
    public function destroy($iddepartamento)
    {
        $departamento = Departamento::findOrFail($iddepartamento);
        $departamento->delete();
        return Redirect::to('tarifa/departamento');
    }
}
