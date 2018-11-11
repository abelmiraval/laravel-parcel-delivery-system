<?php

namespace sisSerpost\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use sisSerpost\Http\Requests\UsuarioRequest;
use sisSerpost\User;

class UsuarioController extends Controller
{
  
     public function __construct()
   {
        $this->middleware('auth');
   }

    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('searchText'));
            $usuarios = DB::table('users')
                        ->where('name', 'LIKE', '%' . $query . '%')
                        ->where('tipo_usuario',1)
                        ->orwhere('tipo_usuario',2)
                        ->orderBy('id', 'desc')
                ->paginate(7);
            return view('seguridad.usuario.index', ["usuarios" => $usuarios, "searchText" => $query]);
        }
    }

    public function create()
    {
        return view("seguridad.usuario.create");
    }

    public function store(UsuarioRequest $request)
    {
        $usuario           = new User;
        $usuario->name     = $request->get('name');
        $usuario->email    = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));
        $usuario->tipo_usuario=$request->get('tipo-usuario');
        $usuario->save();
        return Redirect::to('seguridad/usuario');
    }

    public function edit($id)
    {
        return view("seguridad.usuario.edit", ["usuario" => User::findOrFail($id)]);
    }

    public function update(UsuarioRequest $request, $id)
    {
        $usuario           = User::findOrFail($id);
        $usuario->name     = $request->get('name');
        $usuario->email    = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));
        $usuario->update();
        return Redirect::to('seguridad/usuario');
    }

    public function destroy($id)
    {
        $usuario = DB::table('users')->where('id', '=', $id)->delete();
        return Redirect::to('seguridad/usuario');
    }

}
