<?php
namespace sisSerpost\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use sisSerpost\DetalleEnvioEncomienda;
use sisSerpost\Http\Requests;
use sisSerpost\SubTipoCorrespondencia;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
   {
        $this->middleware('auth');
   }
   
    public function index()
    {
        
        $pastel = DB::table('detalle_envio_encomienda as de')
                  ->join('sub_tipo_correspondencia as stc','stc.idsub_tipo_correspondencia', '=', 'de.idsub_tipo_correspondencia')
                  ->select('stc.nombre',DB::raw('COUNT(de.idsub_tipo_correspondencia) as cantidad'))
                  ->groupBy('stc.nombre') 
                  ->get();

        return view('grafico.graficoEncomienda.chart',['pastel'=>$pastel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
