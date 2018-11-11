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

class SeguimientoEncomienda extends Controller
{
    public function index(){
    	 $destinos   = DB::table('departamento_entrega as de')
                    ->join('departamento as d','d.iddepartamento','de.destino')
                    ->join('departamento as dd','dd.iddepartamento','de.origen')
                    ->select('d.iddepartamento','d.nombre as destino')
                    ->where('dd.nombre','=','Tocache')
                    ->get();
        return view("seguimiento.seguimientoTrabajador.index",["destinos" => $destinos]);
    }


    public function store(SeguimientoEncomiendaRequest $request)
    {

            DB::table('envio_encomienda')
            ->where('codigo', $request->get('codigo'))
            ->update(['estado' => $request->get('iddepartamento')]);
        //UPDATE usuarios SET idioma = 'espanol' WHERE idioma = 'inglés'"; 
      return Redirect::to('seguimiento/seguimientoTrabajador');
    }



 }
