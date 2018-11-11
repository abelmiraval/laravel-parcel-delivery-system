<?php

namespace sisSerpost\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use sisSerpost\Http\Requests\SubTipoCorrespondenciaRequest;
use sisSerpost\SubTipoCorrespondencia;

class SubTipoCorrespondenciaController extends Controller
{

    public function __construct()
   {
        $this->middleware('auth');
   }
    public function index(Request $request)
    {
        if ($request) {
            //si exite el objeto request voy extraer todos los datos de mi tabla cliente

            $query                   = trim($request->get('searchText'));
            $subTipoCorrespondencias = DB::table('sub_tipo_correspondencia as stc')->join('tipo_correspondencia as tc', 'stc.idtipo_correspondencia', '=', 'tc.idtipo_correspondencia')->select('tc.nombre as tipo', 'stc.idsub_tipo_correspondencia', 'stc.nombre', 'stc.descripcion')->where('stc.nombre', 'LIKE', $query . '%')->orderBy('stc.nombre', 'asc')->paginate(7);
            //de cuantos registros quiero hacer la  paginacion

            //a esta vista le vamos a enviar parametros []
            return view('correspondencia.subTipoCorrespondencia.index', ["subTipoCorrespondencias" => $subTipoCorrespondencias, "searchText" => $query]);
        }

    }

    public function create()
    {

        $tipoCorrespondencias = DB::table('tipo_correspondencia')->get();

        return view("correspondencia.subTipoCorrespondencia.create", ["tipoCorrespondencias" => $tipoCorrespondencias]);

    }

    public function store(SubTipoCorrespondenciaRequest $request) //almacena el objeto cliente en nuestra bd cliente

    {

        $subTipoCorrespondencia                         = new SubTipoCorrespondencia;
        $subTipoCorrespondencia->idtipo_correspondencia = $request->get('idtipo_correspondencia'); //(como se llama el objeto de validacion)
        $subTipoCorrespondencia->nombre                 = $request->get('nombre');
        $subTipoCorrespondencia->descripcion            = $request->get('descripcion');

        $subTipoCorrespondencia->save();
        return Redirect::to('correspondencia/subTipoCorrespondencia');

    }

    public function show($idsub_tipo_correspondencia) //para mostrar

    {
        return view("correspondencia.subTipoCorrespondencia.show", ["subTipoCorrespondencia" => SubTipoCorrespondencia::findOrFail($idsub_tipo_correspondencia)]);
        //muestra el cliente especifico findOrFail

    }

    public function edit($idsub_tipo_correspondencia)
    {
        $subTipoCorrespondencia = SubTipoCorrespondencia::findOrFail($idsub_tipo_correspondencia);
        $tipoCorrespondencias   = DB::table('tipo_correspondencia')->get();

        return view("correspondencia.subTipoCorrespondencia.edit", ["subTipoCorrespondencia" => $subTipoCorrespondencia, "tipoCorrespondencias" => $tipoCorrespondencias]);
    }

    public function update(SubTipoCorrespondenciaRequest $request, $idsub_tipo_correspondencia)
    {

        $subTipoCorrespondencia                         = SubTipoCorrespondencia::findOrFail($idsub_tipo_correspondencia);
        $subTipoCorrespondencia->idtipo_correspondencia = $request->get('idtipo_correspondencia'); //(como se llama el objeto de validacion)
        $subTipoCorrespondencia->nombre                 = $request->get('nombre');
        $subTipoCorrespondencia->descripcion            = $request->get('descripcion');

        $subTipoCorrespondencia->update();

        return Redirect::to('correspondencia/subTipoCorrespondencia');

    }

    public function destroy($idsub_tipo_correspondencia)
    {
        $subTipoCorrespondencia = SubTipoCorrespondencia::findOrFail($idsub_tipo_correspondencia);
        $subTipoCorrespondencia->delete();
        return Redirect::to('correspondencia/subTipoCorrespondencia');
    }

}
