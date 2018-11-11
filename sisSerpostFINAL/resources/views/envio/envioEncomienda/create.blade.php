@extends ('layouts.admin')
@section ('contenido')
 <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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

    {!!Form::open(array('url'=>'envio/envioEncomienda','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
            <!-- token-->
  
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label >Comprobante</label>
                <select name="ptipo_comprobante" id="ptipo_comprobante" class="form-control">
                      <option value="">Seleccione</option> 
                      <option value="B">Boleta</option>
                      <option value="F">Factura</option>
                </select>
            </div>
        </div>

        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" >
            <div class="form-group" >
                <label >Serie Comprobante</label>
                <input type="number" name="pserie" id="pserie" class="form-control"  >
            </div>
        </div>

        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label>N° Comprobante</label>
                <input type="number" name="pcorrelativo" id="pcorrelativo" class="form-control" >
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <select name="pidpersona" id="pidpersona" class="form-control selectpicker" data-live-search="true">
                  @foreach($personas as $persona)
                  <option value="{{$persona->idpersona}}">{{$persona->cliente}}</option>
                  @endforeach
                </select>
            </div>
        </div>


    

  </div>

<div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                          <label>Consignado</label>
                             <input type="text" name="pconsignado" id="pconsignado" class="form-control" placeholder="Consignado...">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                          <label >Descripcion Envio</label>
                             <input type="text" name="pdescripcion" id="pdescripcion" class="form-control" placeholder="Descripcion...">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                      <label >Tipo Correspondencia</label>
                          <select name="pidtipo_correspondencia" id="pidtipo_correspondencia" class="form-control">
                                <option value="">Seleccione</option>
                                 @foreach($tipo_correspondencias as $tp)
                                    <option value="{{$tp->idtipo_correspondencia}}">{{$tp->nombre}}</option>
                                  @endforeach
                           </select>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                      <label >Sub Tipo</label>
                          <select name="pidsub_tipo_correspondencia" id="pidsub_tipo_correspondencia"  class="form-control">
                              <option value="">Seleccione</option>
                           </select>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                      <label for="origen">Origen</label>
                             <input type="text" name="porigen" id="porigen" value="Tocache" class="form-control" disabled="true">
                    </div>
                </div>

        

                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                      <label >Destino</label>
                         <select name="pdestino" id="pdestino"  class="form-control"> 
                                <option value="">Seleccione</option>
                                 @foreach($destinos as $destino)
                                    <option value="{{$destino->iddepartamento_entrega}}">{{$destino->destino}}</option>
                                
                                  @endforeach
                           </select>
                    </div>
                </div>

                

                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                      <label >Zona</label>
                          <select name="pzona" id="pzona" class="form-control">
                                <option value="Zona 1">Zona 1</option>
                                <option value="Zona 2">Zona 2</option>
                                <option value="Zona 3">Zona 3</option>
                           </select>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                      <label >Peso</label>
                          <select name="pidpeso" id="pidpeso" class="form-control " >
                                 @foreach($pesos as $peso)
                                    <option value="{{$peso->idpeso}}">{{$peso->minimo.' - '.$peso->maximo}}
                                    </option>
                                  @endforeach
                           </select>
                    </div>
                </div>

                 <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                          <label>Cantidad</label>
                             <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad...">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                      <label >Tarifa S/.</label>
                          <input type="number"  step="any" name="ptarifa" id="ptarifa" class="form-control" placeholder="Tarifa...">
                    </div>
                </div>


                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12" >
                    <div class="form-group">
                          <input type="hidden" name="ptotal" id="ptotal" class="form-control">
                    </div>
                </div>   

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" >
                    <div class="form-group">
                             <input type="hidden" name="pidzona" id="pidzona" class="form-control">  
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12" >
                    <div class="form-group">
                        
                        <button style="width: 100px;" type="button" id="bt_tarifa" class="btn btn-success ">Tarifa</button>  

                        <button style="width: 100px;" type="button" id="bt_add" class="btn btn-primary ">Agregar</button>   

                    </div>
                </div>



                <!-- &nbsp;&nbsp; -->
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <table id="detalles" class="table table-striped table-bordered table-condensed table-hover table-responsive ">
                       <thead style="background-color: #B2FFFF">
                            <th >Opc</th>
                            <th >Consignado</th>
                            <th >Descripcion</th>
                            <th >Correspondencia</th>
                            <th >Destino</th>
                            <th >Peso del Envio</th>
                            <th >Cantidad</th>
                            <th >Tarifa</th>
                            <th >Sub Total</th>

                        </thead>
                        <tfoot>
                      
                            <th><br>IGV 18%</br>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>             
                            <th><br> </br><h4  id="total" name="total">S/. 0.0</h4></th>

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
<style type="text/css">
  #detalles input{
  width: 100%;
    text-align: center;
}


</style>
{!!Form::close()!!}
@push('scripts')

<script >

//------------------------------------------Esto es para tarifa---------------------------------------------------
 var bandera=true;
$(document).ready(function(){
    $('#bt_add').click(function(){
      if (bandera) {
         $('#pnavegacion').click();
      }
      bandera=false;
     
    });

    
});

$(document).ready(function(){
    $('#bt_tarifa').click(function(){
        var data = { 
          'destino' :  document.getElementById("pdestino").value,
          'zona' : document.getElementById("pzona").value,
          'peso' : document.getElementById("pidpeso").value
        }   
        console.log(data); 
        $.post('/tarifaZona',data ).success(function(data){
          console.log('Estos son los datos ',data[0])  
           $("#ptarifa").val(data[0].tarifa);
           $("#pidzona").val(data[0].idzona);
        }); 
    });
});




function devolverIdDestino(){

}




//------------------------------------------Esto es para origen y destino------------------------------------------

$(document).ready(function(){
$("#porigen").on('change',function(event){
    $("#pdestino").empty();
   $.get("/departamentosDestino/"+event.target.value+"", function(response, state){
    console.log(response);
    for(i=0;i<response.length;i++){
      $("#pdestino").append("<option value='"+response[i].iddepartamento_entrega+"'>"+response[i].nombre_destino+"</option>");
    }

        });

    });

});﻿


//-----------------------------------------------Esto es para Serie y Correlativo-------------------------------------------
$(document).ready(function(){

$("#ptipo_comprobante").on('change',function(event){
 $("#pserie").val("");
      $("#pcorrelativo").val(""); 
      $.get("/comprobanteFactura/"+event.target.value+"", function(response, state){
    console.log(response);
   
     
       if (response[0].tipo_comprobante=='F')
       { 

          $("#pserie").val(response[0].serie);
          $("#pcorrelativo").val(response[0].correlativo);
       }else{
            if (response[0].tipo_comprobante=='B') 
            {
              $("#pcorrelativo").val(response[0].numero_boleta);
            }
       }
      
        
        });

    });

});﻿


//------------------------------------------------Esto es para las tipos de correspondencias--------------------------------


$(document).ready(function(){
$("#pidtipo_correspondencia").on('change',function(event){
$.get("/subCorrespondencias/"+event.target.value+"", function(response, state){
    console.log(response);
    $("#pidsub_tipo_correspondencia").empty();
    for(i=0;i<response.length;i++){
      $("#pidsub_tipo_correspondencia").append("<option value='"+response[i].idsub_tipo_correspondencia+"'>"+response[i].nombre+"</option>");
    }
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
var igv=0.18;
var subigv=0;
var nuevo_total=0;
total=0;
subtotal=[];
$("#guardar").hide();

function agregar(){
  consignado=$("#pconsignado").val();
  descripcion=$("#pdescripcion").val(); 
  zona=$("#pidzona").val();
  tarifa=$("#ptarifa").val();
  idtipo_correspondencia=$("#pidtipo_correspondencia").val();
  tipo_correspondencia=$("#pidtipo_correspondencia option:selected").text();

  idsub_tipo_correspondencia=$("#pidsub_tipo_correspondencia").val();
  sub_tipo_correspondencia=$("#pidsub_tipo_correspondencia option:selected")  .text();
  cantidad=$("#pcantidad").val();
  descripcion=$("#pdescripcion").val();
  idpeso=$("#pidpeso").val();
  peso=$("#pidpeso option:selected").text();

  destino=$("#pdestino option:selected").text();
  origen=$("#porigen option:selected").text();


  idtipo_comprobante=$("#ptipo_comprobante").val();
  tipo_comprobante=$("#ptipo_comprobante option:selected").text();

  if (idtipo_comprobante=='F') {
          if (tarifa!="" && consignado!="" && descripcion!="" && zona!="" && idsub_tipo_correspondencia!="Seleccione" && idsub_tipo_correspondencia!="" && cantidad!="" && tarifa!="") {

            subtotal[cont]=(cantidad*tarifa);
            total=total+subtotal[cont];
            subigv=total*igv;
         
            var fila='<tr class="selected" id="fila'+cont+'"> <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="consignado[]" value="'+consignado+'">'+consignado+'</td><td><input type="hidden" name="descripcion[]" value="'+descripcion+'">'+descripcion+'</td><td><input type="hidden" name="idsub_tipo_correspondencia[]" value="'+idsub_tipo_correspondencia+'">'+sub_tipo_correspondencia+'</td><td><input type="hidden" name="zona[]" value="'+zona+'">'+destino+'</td><td><input type="hidden" name="idpeso[]" value="'+idpeso+'">'+peso+'</td><td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="hidden" name="tarifa[]" value="'+tarifa+'">'+tarifa+'</td><td>'+subtotal[cont]+'</td>/tr>';
            cont++;
            
            limpiar();
            
            nuevo_total=subigv+total;
            $("#total").html(subigv+" "+"S/. "+nuevo_total);
            $("#ptotal").val(nuevo_total);

            evaluar();
            $("#detalles").append(fila);
          }
          else{
            alert("Error al ingresar el detalle del ingreso, revise los datos ")
          }

    }else{
     if (idtipo_comprobante=='B') {
       if (tarifa!="" && consignado!="" && descripcion!="" && zona!="" && idsub_tipo_correspondencia!="Seleccione" && cantidad!="" && tarifa!="") {

            subtotal[cont]=(cantidad*tarifa);
            total=total+subtotal[cont];
         
            var fila='<tr class="selected" id="fila'+cont+'"> <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="consignado[]" value="'+consignado+'">'+consignado+'</td><td><input type="hidden" name="descripcion[]" value="'+descripcion+'">'+descripcion+'</td><td><input type="hidden" name="idsub_tipo_correspondencia[]" value="'+idsub_tipo_correspondencia+'">'+sub_tipo_correspondencia+'</td><td><input type="hidden" name="zona[]" value="'+zona+'">'+destino+'</td><td><input type="hidden" name="idpeso[]" value="'+idpeso+'">'+peso+'</td><td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="hidden" name="tarifa[]" value="'+tarifa+'">'+tarifa+'</td><td>'+subtotal[cont]+'</td>/tr>';
            cont++;
            
            limpiar();
            
            $("#total").html("S/. "+total);
            $("#ptotal").val(total);

            evaluar();
            $("#detalles").append(fila);
          }
          else{
            alert("Error al ingresar el detalle del ingreso, revise los datos ")
          }
      }  
    }      

}


function limpiar(){
$("#pdescripcion").val("");
$("#pcantidad").val("");
$("#ptarifa").val("");
}

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
