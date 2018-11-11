@extends ('layouts.admin')
@section ('contenido')
 <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h3>Nueva Liquidacion:</h3>
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

    {!!Form::open(array('url'=>'personal/liquidacionMoviliaria','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
            <!-- token-->

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="trabajador">Trabajador</label>
                <select name="pidpersona" id="pidpersona" class="form-control selectpicker" data-live-search="true">
                  @foreach($personas as $persona)
                  <option value="{{$persona->idpersona}}">{{$persona->trabajador}}</option>
                  @endforeach
                </select>
            </div>
        </div>   
    </div>



<div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">

                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12" >
                    <div class="form-group">
                      <label >Origen</label>
                          <input type="text" name="porigen" id="porigen" class="form-control" value="Tocache" disabled="true">
                    </div>
                </div>  

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                      <label >Destino</label>
                          <select name="pidcentro_poblado" id="pidcentro_poblado" class="form-control">
                                <option >Seleccione</option>
                                 @foreach($centro_poblados as $centro_poblado)
                                    <option value="{{$centro_poblado->idcentro_poblado}}">{{$centro_poblado->destino}}</option>
                                  @endforeach
                           </select>
                    </div>
                </div>


                 <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                          <label>Cantidad</label>
                             <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad...">
                    </div>
                </div>
  
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                      <label >Importe S/.</label>
                          <input type="number" name="pimporte" id="pimporte" class="form-control" placeholder="Importe..">
                    </div>
                </div>

                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
                    <div class="form-group">
                        <button type="button" id="bt_add" class="btn btn-primary ">Agregar</button>   

                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12" >
                    <div class="form-group">
                          <input type="hidden" name="ptotal" id="ptotal" class="form-control">
                    </div>
                </div>   

                
                <!-- &nbsp;&nbsp; -->
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <table id="detalles" class="table table-striped table-bordered table-condensed table-hover table-responsive ">
                        <thead style="background-color: #B2FFFF">

                            <th>Opc</th>
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
                            <th><h4 id="total"></h4></th>
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
                  <!---Este input va estar oculto. Este token me va permitir cotrolar las transacciones -->

                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
      </div>
</div>
{!!Form::close()!!}
@push('scripts')

<script >





//-----------------------------------------------Esto es para calcular el importe-------------------------------------------
$(document).ready(function(){

$("#pidcentro_poblado").on('change',function(event){
      $.get("/liquidacionImporte/"+event.target.value+"", function(response, state){console.log(response);
   
          $("#pimporte").val(response[0].importe);
      
        });

    });

});﻿                            


//----------------------------------------------Esto es para la tabla detalle producto-------------------------------------
$(document).ready(function(){
  $('#bt_add').click(function(){
    agregar();
  })
});

var cont=0;
total=0;
subtotal=[];
$("#guardar").hide();


function agregar(){
 var persona=$("#pidpersona").val();
 
 var origen=$("#porigen").val();
 var idcentro_poblado=$('#pidcentro_poblado').val();
 var  centro_poblado=$("#pidcentro_poblado option:selected").text(); 
 var cantidad=$('#pcantidad').val();
 var importe=parseInt($('#pimporte').val());

  //var f = new Date(); 
  //var fecha=f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear();


  if (persona!="" && origen!="" && centro_poblado!="Seleccione" && cantidad!="" && importe!="") {

    subtotal[cont]=importe;
    total=total+subtotal[cont];
    var fila='<tr class="selected" id="fila'+cont+'"> <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="text" name="origen[]" value="'+origen+'"></td><td><input type="hidden" name="idcentro_poblado[]" value="'+idcentro_poblado+'">'+centro_poblado+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="importe[]" value="'+importe+'"></td></tr>';
    cont++;
  //    limpiar();
    $("#total").html("S/. "+total);
    $("#ptotal").val(total);
   
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
  if (total>0) {
    $("#guardar").show();
  }else{
    $("#guardar").hide();
  }
}

function eliminar(index){
  total=total-subtotal[index];
  $("#total").html("S/. "+total);
  $("#fila"+index).remove();
  evaluar();
}



//--------------------------------------------------------------------------------------------------------------------------



</script>
@endpush

@endsection
