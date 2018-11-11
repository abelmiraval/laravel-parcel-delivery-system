@extends ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="valija">CODIGO VALIJA: {{$valija->idvalija}} </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                       <thead style="background-color: #B2FFFF">
                            <th>ID</th>
                            <th>Codigo</th>
                            <th>Ciudad Entrega</th>
                            <th>Opciones</th>
                            
                        </thead>

                        <tfoot>
                      
                            <th></th>
                            <th></th>
                            <th></th>
                            
                         
                        </tfoot>

                        <tbody>
                          @foreach($detalles as $detalle)
                          <tr>
                            <!--<td>{{$detalle->serie.'-'.$detalle->correlativo}}</td>-->
                            <td>{{$detalle->idenvio_encomienda}}</td>   
                            <td>{{$detalle->codigo}}</td>                   
                            <td>{{$detalle->origen.' - '.$detalle->destino}}</td>
                            <td><a href="{{URL::action('EnvioEncomiendaController@show',$detalle->idenvio_encomienda)}}"><button class="btn btn-primary">Detalles Envio</button></a></td>
                          </tr>
                          @endforeach
                        </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
@endsection

