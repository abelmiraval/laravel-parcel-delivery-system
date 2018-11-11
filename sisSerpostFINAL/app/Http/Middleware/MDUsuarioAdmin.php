<?php

namespace sisSerpost\Http\Middleware;

use Closure;

class MDUsuarioAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next)
    {
        
        $usuario_actual=\Auth::user();
        if($usuario_actual->tipo_usuario!=1){
         return view("mensajes.msj_rechazado")->with("msj","No tiene suficientes Privilegios para acceder a esta seccion");
        }
        return $next($request);
    
    }
}
