<?php

namespace sisSerpost\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; //para hacer las redirecciones
use Illuminate\Support\Facades\Redirect; //para poder subir la imagen desde la maquina del cliente, hacia el servidor
use sisSerpost\Http\Requests; //para trabajar con laravel
use sisSerpost\Http\Requests\TipoCorrespondenciaRequest; //vamo agregar el modelo
use sisSerpost\SubTipoCorrespondencia;
use sisSerpost\TipoCorrespondencia;

//para trabajar con la clase db de laravel

class TipoCorrespondenciaController extends Controller
{
    public function __construct()
   {
        $this->middleware('auth');
   }
    public function index(Request $request)
    {
        if ($request) {
//si exite el objeto request voy extraer todos los datos de mi tabla cliente
            $query = trim($request->get('searchText')); //searchText para hacer busqueda por clientes
            //cual es el texto de busqueda para filtrar los clientes
            //y se va guardar en la variable query
            //trim quitar los espacio en blanco al inicio y al final
            $tc = DB::table('tipo_correspondencia')->where('nombre', 'LIKE', $query . '%')->orderBy('nombre', 'asc')->paginate(7);
            //de cuantos registros quiero hacer la  paginacion

            //a esta vista le vamos a enviar parametros []
            return view('correspondencia.tipoCorrespondencia.index', ["tipoCorrespondencias" => $tc, "searchText" => $query]);
        }

    }

    public function create()
    {

        return view("correspondencia.tipoCorrespondencia.create");

    }

    public function store(TipoCorrespondenciaRequest $request)
    //almacena el objeto cliente en nuestra bd cliente
    {
        $tc              = new TipoCorrespondencia;
        $tc->nombre      = $request->get('nombre');
        $tc->descripcion = $request->get('descripcion');
        $tc->save();

        return Redirect::to('correspondencia/tipoCorrespondencia');

    }

    public function show($idtipo_correspondencia)
    {
        return view("correspondencia.tipoCorrespondencia.show", ["tipoCorrespondencia" => TipoCorrespondencia::findOrFail($idtipo_correspondencia)]);

    }

    public function edit($idtipo_correspondencia)
    {
        return view("correspondencia.tipoCorrespondencia.edit", ["tc" => TipoCorrespondencia::findOrFail($idtipo_correspondencia)]);
    }

    public function update(TipoCorrespondenciaRequest $request, $idtipo_correspondencia)
    {
        $tc              = TipoCorrespondencia::findOrFail($idtipo_correspondencia);
        $tc->nombre      = $request->get('nombre'); //(como se llama el objeto de validacion)
        $tc->descripcion = $request->get('descripcion');
        $tc->update();
        return Redirect::to('correspondencia/tipoCorrespondencia');

    }
    public function destroy($idtipo_correspondencia)
    {
        $tc = TipoCorrespondencia::findOrFail($idtipo_correspondencia);
        $tc->delete();
        return Redirect::to('correspondencia/tipoCorrespondencia');
    }

    //este metodo
    public function getSubCorrepondencias(Request $request, $id)
    {
        if ($request->ajax()) {
            $stc = SubTipoCorrespondencia::subCorrespondencias($id);
            return response()->json($stc);
        }
    }

}
