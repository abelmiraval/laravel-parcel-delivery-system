@extends ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <P>{{$envio_encomienda->nombre_cliente}}</P>
            </div>
        </div>

        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
           <div class="form-group">
                     <label >Ubicacion</label>
                      <P>{{$envio_encomienda->estado}}</P>         
            </div>
        </div>

        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label >Comprobante</label>
                @if($envio_encomienda->tipo_comprobante=='B')
                   <p>Boleta</p>
                @else
                    <p>Factura</p>
                @endif
            </div>
        </div>

     

        @if($envio_encomienda->tipo_comprobante=='F')             
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="serie">Serie Comprobante</label>
                <p>{{$envio_encomienda->serie}}</p>
            </div>
        </div>
        @endif                

        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="correlativo">N° Comprobante</label>
                @if($envio_encomienda->tipo_comprobante=='F')
                        <p>{{$envio_encomienda->correlativo}}</p>
                @else
                           @if($envio_encomienda->tipo_comprobante=='B')
                                 <p>{{$envio_encomienda->numero_boleta}}</p>
                           @endif
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

                            <th>Consignado</th>
                            <th>Descripcion Envio</th>
                            <th>Tipo de Correspondencia</th>
                            <th>Lugar</th>
                            <th>Peso</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Sub Total</th>
                        </thead>

                        <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="total">{{$envio_encomienda->total}}</h4></th>
                        </tfoot>

                        <tbody>
                          @foreach($detalles as $detalle)
                          <tr>
                            <td>{{$detalle->consignado}}</td>
                            <td>{{$detalle->descripcion}}</td>
                            <td>{{$detalle->nombre_correspondencia}}</td>
                            <td>{{$detalle->origen.' - '.$detalle->destino.' - '.$detalle->nombre}}</td>
                            <td>{{$detalle->minimo.' hasta '.$detalle->maximo}}</td>
                            <td>{{$detalle->tarifa}}</td>
                            <td>{{$detalle->cantidad}}</td>
                            <td>{{$detalle->tarifa*$detalle->cantidad}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                  </table>
                </div>
            </div>
        </div>
</div>
<div class="row">

     <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" >
         <div class="form-group">
            <input type="hidden" name="pidenvio_encomienda" id="pidenvio_encomienda" value="{{$envio_encomienda->idenvio_encomienda}}" class="form-control">  
         </div>
     </div>

</div>

@push('scripts')
<script >
$(document).ready(function(){
    $('#btn-descargar').click(function(){
        var data = { 
          'idenvio_encomienda' :  document.getElementById("pidenvio_encomienda").value,
        }   
        console.log(data); 
        $.post('/crearReporteEncomienda',data ).success(function(data){
        //  console.log('Estos son los datos ',data[2])  
           //$("#ptarifa").val(data[0].tarifa);
           //$("#pidzona").val(data[0].idzona);
        });        
    });
});
</script>
@endpush

@endsection


