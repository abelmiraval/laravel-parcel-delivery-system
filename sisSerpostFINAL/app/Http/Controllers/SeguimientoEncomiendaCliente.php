<?php

namespace sisSerpost\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use sisSerpost\DetalleEnvioEncomienda;
use sisSerpost\EnvioEncomienda;
use sisSerpost\Http\Requests\EnvioEncomiendaRequest;
use sisSerpost\Http\Requests\SeguimientoEncomiendaRequest;
class SeguimientoEncomiendaCliente extends Controller
{

	public function index(){
        return view("seguimiento.seguimientoCliente.index",[]);
    }


   
    public function devolverUbicacion(Request $request)
    { 
        $data = EnvioEncomienda::buscarUbicacion($request->all());
        return response()->json($data); 
    }
}
