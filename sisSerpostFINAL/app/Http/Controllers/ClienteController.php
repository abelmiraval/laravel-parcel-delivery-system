<?php

namespace sisSerpost\Http\Controllers;

//Espacios de nombres
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; //vamos agregar el modelo (sisSerpost asi se llama el proyecto)
use sisSerpost\Http\Requests; //para hacer redirecciones
use sisSerpost\Http\Requests\PersonaRequest;
use sisSerpost\Persona;
 
//para trabajar con la clase db laravel

class ClienteController extends Controller
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
                ->where('tipo', '=', 'Cliente')
                ->orwhere('numero_documento', 'LIKE', '%' . $query . '%')
                ->where('tipo', '=', 'Cliente')
                ->orderBy('idpersona', 'desc')
                ->paginate(7); //de cuantos registros quiero hacer la  paginacion

            //a esta vista le vamos a enviar parametros [todos los clientes(persona) que sera almacenado en la variable personas,y la cadena query ingresada
            return view('envio.cliente.index', ["personas" => $personas, "searchText" => $query]);
        }

    }

    public function create()
    {

        return view("envio.cliente.create");

    }

    public function store(PersonaRequest $request) //almacena el objeto cliente en nuestra bd cliente

    {
        $persona                   = new Persona;
        $persona->tipo             = 'Cliente';
        $persona->nombre           = $request->get('nombre'); //(como se llama el objeto de validacion)
        $persona->apell_paterno    = $request->get('apell_paterno');
        $persona->apell_materno    = $request->get('apell_materno');
        $persona->tipo_documento   = $request->get('tipo_documento');
        $persona->numero_documento = $request->get('numero_documento');
        $persona->direccion        = $request->get('direccion');
        $persona->telefono         = $request->get('telefono');
        $persona->save();
        return Redirect::to('envio/cliente');

    }

    public function show($idpersona) //para mostrar

    {
        return view("envio.cliente.show", ["persona" => Persona::findOrFail($idpersona)]);
        //muestra el cliente especifico findOrFail

    }

    public function edit($idpersona)
    {
        return view("envio.cliente.edit", ["persona" => Persona::findOrFail($idpersona)]);
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
        $persona->update();
        return Redirect::to('envio/cliente');

    }

    public function destroy($idpersona)
    {
        $persona       = Persona::findOrFail($idpersona);
        $persona->tipo = 'Inactivo';
        $persona->update();
        return Redirect::to('envio/cliente');
    }

}
