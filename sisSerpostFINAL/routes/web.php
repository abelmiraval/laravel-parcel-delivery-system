
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('/', function () {
    return view('auth/login');
});



//todas la rutas posibles que tendra nuestro sistema

//Creamos para hacer un grupo de rutas con las peticiones simples, estas rutas llegaran a un controlador

//Esto es de envios
Route::resource('envio/cliente', 'ClienteController');
Route::resource('envio/envioEncomienda', 'EnvioEncomiendaController');
Route::resource('envio/valija', 'ValijaController');

//Esto es de correpondencia
Route::resource('correspondencia/tipoCorrespondencia', 'TipoCorrespondenciaController');
Route::resource('correspondencia/subTipoCorrespondencia', 'SubTipoCorrespondenciaController');
//esto es adicional dropdown
Route::get('subCorrespondencias/{id}', 'TipoCorrespondenciaController@getSubCorrepondencias');

//Esto es de : Tarifa
Route::resource('tarifa/departamento', 'DepartamentoController');
Route::resource('tarifa/departamentoEntrega', 'DepartamentoEntregaController');

//esto es adicional dropdown
Route::get('departamentosDestino/{origen}', 'DepartamentoEntregaController@getDepartamentosDestino');

Route::resource('tarifa/peso', 'PesoController');
Route::resource('tarifa/zona', 'ZonaController');
	
Route::resource('seguridad/usuario', 'UsuarioController');

//Esto es de: Personal
Route::resource('personal/trabajador', 'TrabajadorController');

//Esto es para buscar la tarifa 
Route::post('tarifaZona', 'ZonaController@devolverTarifa');

//para los graficos
Route::resource('grafico/graficoEncomienda', 'ChartController');
Route::resource('grafico/graficoEncomiendaNode', 'ChartJsController@graficoSubTipoCorrespondenciaCantidad');
Route::post('fechaGraficoSub', 'ChartJsController@devolverFechaGraficoSub');





//Envio Encomienda----->Para serie y correlativo
Route::get('comprobanteFactura/{tipo_comprobante}', 'EnvioEncomiendaController@getComprobanteFactura');

//Esto es para liquidacion moviliaria
Route::resource('personal/liquidacionMoviliaria', 'LiquidacionMoviliariaController');
Route::resource('personal/centroPoblado', 'CentroPobladoController');
Route::get('liquidacionImporte/{idcentro_poblado}', 'CentroPobladoController@getLiquidacionImporte');

//Esto es para seguimiento
Route::resource('seguimiento/seguimientoTrabajador', 'SeguimientoEncomienda');
Route::resource('seguimiento/seguimientoCliente', 'SeguimientoEncomiendaCliente');
Route::post('buscarUbicacion', 'SeguimientoEncomiendaCliente@devolverUbicacion');


//Cuando ponemos en el navegador cualquiera de estas rutas va hacia carpeta y ejecuta el archivo index
Auth::routes();
Route::auth();
Route::get('/home', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');
//Route::resource('auth/login','Auth\LoginController@logout');


//Route::get('/{slug?}', 'HomeController@index');








Route::get('/invoice/pdf/{id}', 'InvoiceController@pdf');
Route::get('/invoice1/pdf1/{id}', 'InvoiceController@pdf1');





























