@extends ('layouts.admin')
@section ('contenido')

<div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="trabajador">Trabajador</label>
                <P>{{$liquidacion->nombre_trabajador}}</P>
            </div>
        </div>



        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
           <div class="form-group">
                     <label >Estado</label>
                      @if($liquidacion->estado=='1')
                       <p>Liquidado</p>
                      @else
                       <p>Proceso</p>
                      @endif
            </div>
        </div>
</div>

<div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                       <thead style="background-color: #B2FFFF">
            
                            <th>Fecha</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Cantidad</th>
                            <th>Importe</th>
  
                        </thead>

                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total">{{$liquidacion->total}}</h4></th>
                        </tfoot>

                        <tbody>
                          @foreach($detalles as $detalle)
                          <tr>
                            <td>{{$detalle->fecha}}</td>
                            <td>{{$detalle->origen}}</td>
                            <td>{{$detalle->destino}}</td>
                            <td>{{$detalle->cantidad}}</td>
                            <td>{{$detalle->importe}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                  </table>
                </div>
            </div>
        </div>
</div>

@endsection
