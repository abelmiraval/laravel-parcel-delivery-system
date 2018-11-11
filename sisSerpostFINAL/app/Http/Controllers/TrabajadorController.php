<?php

namespace sisSerpost\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use sisSerpost\Http\Requests\PersonaRequest;
use sisSerpost\Persona;

class TrabajadorController extends Controller
{
     public function __construct()
   {
        $this->middleware('auth');
   }
   
    //primero se ejecuta el codigo html y de ahi viene aqui al controlador para hacer los siguientes
    //procesos que se muestran
    public function index(Request $request)
    {
        if ($request) //si exite el objeto request voy extraer todos los datos de mi tabla cliente
        {
            $query = trim($request->get('searchText')); //searchText para hacer busqueda por clientes
            //cual es el texto de busqueda para filtrar los clientes
            //y se va guardar en la variavle query
            //trim quitar los espacio en blanco al inicio y al final
            $personas = DB::table('persona')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->where('tipo', '=', 'Trabajador')
                ->orwhere('numero_documento', 'LIKE', '%' . $query . '%')
                ->where('tipo', '=', 'Trabajador')
                ->orderBy('idpersona', 'desc')
                ->paginate(7); //de cuantos registros quiero hacer la  paginacion

            //a esta vista le vamos a enviar parametros [todos los clientes(persona) que sera almacenado en la variable personas,y la cadena query ingresada
            return view('personal.trabajador.index', ["personas" => $personas, "searchText" => $query]);
        }

    }

    public function create()
    {

        return view("personal.trabajador.create");

    }

    public function store(PersonaRequest $request) //almacena el objeto trabajador en nuestra bd cliente

    {
        $persona                   = new Persona;
        $persona->tipo             = 'Trabajador';
        $persona->nombre           = $request->get('nombre'); //(como se llama el objeto de validacion)
        $persona->apell_paterno    = $request->get('apell_paterno');
        $persona->apell_materno    = $request->get('apell_materno');
        $persona->tipo_documento   = $request->get('tipo_documento');
        $persona->numero_documento = $request->get('numero_documento');
        $persona->direccion        = $request->get('direccion');
        $persona->telefono         = $request->get('telefono');
        $persona->inicio_contrato         = $request->get('inicio_contrato');
        $persona->fin_contrato         = $request->get('fin_contrato');
        
        $persona->save();
        return Redirect::to('personal/trabajador');

    }

    public function show($idpersona) //para mostrar

    {
        return view("personal.trabajador.show", ["persona" => Persona::findOrFail($idpersona)]);
        //muestra el trabajador especifico findOrFail

    }

    //llama de la vista y ejcuta esta funcion 
    public function edit($idpersona)
    {
        return view("personal.trabajador.edit", ["persona" => Persona::findOrFail($idpersona)]);
        //devuelve la persona 
    }


    public function update(PersonaRequest $request, $idpersona)
    {
        $persona                   = Persona::findOrFail($idpersona);
        $persona->nombre           = $request->get('nombre'); //(como se llama el objeto de validacion)
        $persona->apell_paterno    = $request->get('apell_paterno');
        $persona->apell_materno    = $request->get('apell_materno');
        $persona->tipo_documento   = $request->get('tipo_documento');
        $persona->numero_documento = $request->get('numero_documento');
        $persona->direccion        = $request->get('direccion');
        $persona->telefono         = $request->get('telefono');
        $persona->inicio_contrato        = $request->get('inicio_contrato');
        $persona->fin_contrato         = $request->get('fin_contrato');
        $persona->update();
        return Redirect::to('personal/trabajador');

    }

    public function destroy($idpersona)
    {
        $persona       = Persona::findOrFail($idpersona);
        $persona->tipo = 'Inactivo';
        $persona->update();
        return Redirect::to('personal/trabajador');
    }
}
