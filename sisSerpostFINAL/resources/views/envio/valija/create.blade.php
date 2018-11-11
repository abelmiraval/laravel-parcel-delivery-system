@extends ('layouts.admin')
@section ('contenido')
 <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h3>Nueva Valija</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif
    </div>
 </div>

{!!Form::open(array('url'=>'envio/valija','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
            <!-- token-->
<div class="row">
    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="valija">Codigo Valija</label>
                     @foreach($valija as $v)
                    <input type="number" name="valija" class="form-control" value="{{$v->maximo}}" disabled="true">
                    @endforeach
                </div>
    </div>


  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" class="form-control">
            </div>
    </div>
 
  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="estado">Estado</label>
               <select name="estado" class="form-control">
                        <option value="1">Enviando</option>
                      
                </select>
            </div>
    </div>
 </div>  
       
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" >
                    <div class="form-group">
                      <label >Origen</label>

                          <input type="text" name="porigen" id="porigen" class="form-control" value="Tocache" disabled="true">
                    </div>
                </div>  

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                      <label >Destino</label>
                          <select name="piddepartamento_entrega" id="piddepartamento_entrega"  class="form-control selectpicker" data-live-search="true">
                                <option >Seleccione</option>
                                 @foreach($destinos as $destino)
                                    <option value="{{$destino->iddepartamento_entrega}}">{{$destino->destino_departamento}}</option>
                                  @endforeach
                           </select>
                    </div>
                </div>
                
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                      <label >Comprobante Envio</label>
                          <select name="pidenvio_encomienda" id="pidenvio_encomienda"  class="form-control selectpicker" data-live-search="true">
                                <option >Seleccione Encomienda</option>
                                 @foreach($envio_encomiendas as $envio)
                                    <option value="{{$envio->idenvio_encomienda}}">{{$envio->codigo}}</option>
                                  @endforeach
                           </select>
                    </div>
                </div>
                

                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                    <div class="form-group">
                        <button type="button" id="bt_add" class="btn btn-primary ">Agregar</button>   

                    </div>
                </div>
                
                <!-- &nbsp;&nbsp; -->
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <table id="detalles" class="table table-striped table-bordered table-condensed table-hover table-responsive ">
                        <thead style="background-color: #B2FFFF">

                            <th>Opc</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Comprobante Envio</th>
                  
  
                        </thead>

                        <tfoot>

                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                        <tbody>

                        </tbody>
                  </table>
                </div>
            </div>
        </div>

       <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
      </div>
</div>
{!!Form::close()!!}
@push('scripts')

<script >


//----------------------------------------------Esto es para la tabla detalle producto-------------------------------------
$(document).ready(function(){
  $('#bt_add').click(function(){
    agregar();
  })
});

var cont=0;

$("#guardar").hide();


function agregar(){
 var  origen=$("#porigen").val();
 var  iddepartamento_entrega=$('#piddepartamento_entrega').val();
 var  departamento_entrega=$("#piddepartamento_entrega option:selected").text(); 
 var  idenvio_encomienda=$('#pidenvio_encomienda').val();
 var envio_encomienda=$("#pidenvio_encomienda option:selected").text(); 
 
  if ( origen!="" && departamento_entrega!="Seleccione" && idenvio_encomienda!="Seleccione Encomienda") {

    var fila='<tr class="selected" id="fila'+cont+'"> <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="origen" value="'+origen+'">'+origen+'</td><td><input type="hidden" name="iddepartamento_entrega[]" value="'+iddepartamento_entrega+'">'+departamento_entrega+'</td><td><input type="hidden" name="idenvio_encomienda[]" value="'+idenvio_encomienda+'">'+envio_encomienda+'</td></tr>';
    cont++;
  //    limpiar();

    evaluar();
    $("#detalles").append(fila);
  }
  else{
    alert("Error al ingresar el detalle del ingreso, revise los datos")
  }

}


//function limpiar(){
// $("#pdescripcion").val("ds")
//  $("#pcantidad").val("sds")
//  $("#ptarifa").val("sds")
//}

function evaluar(){
  if (cont>0) {
    $("#guardar").show();
  }else{
    $("#guardar").hide();
  }
}

function eliminar(index){
  $("#fila"+index).remove();
  evaluar();
}



//--------------------------------------------------------------------------------------------------------------------------



</script>
@endpush

@endsection