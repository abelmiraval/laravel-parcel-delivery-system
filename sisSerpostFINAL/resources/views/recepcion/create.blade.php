@extends ('layouts.admin')
@section ('contenido')
 <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h3>Nueva Recepcion:</h3>
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

    {!!Form::open(array('url'=>'recepcion/recepcionEncomienda','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
            <!-- token-->

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

     
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="num_boleta">N° Boleta</label>
                <input type="number" name="pnum_boleta" id="pnum_boleta" class="form-control" disabled="true" >
            </div>
        </div>

  </div>

<div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                          <label for="consignado">Consignado</label>
                             <input type="text" name="pconsignado" id="pconsignado" class="form-control" placeholder="Consignado...">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                          <label for="descripcion">Descripcion Envio</label>
                             <input type="text" name="pdescripcion" id="pdescripcion" class="form-control" placeholder="Descripcion...">
                    </div>
                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
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

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                      <label >Sub Tipo</label>
                          <select name="pidsub_tipo_correspondencia" id="pidsub_tipo_correspondencia"  class="form-control">
                              <option value="">Seleccione</option>
                           </select>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                      <label >Origen</label>
                          <select name="porigen" id="porigen" class="form-control">
                                <option value="">Seleccione</option>
                                 @foreach($ciudades_origen as $origen)
                                    <option value="{{$origen->origen}}">{{$origen->nombre}}</option>
                                  @endforeach
                           </select>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                      <label >Destino</label>
                          <select name="pdestino" id="pdestino" class="form-control">
                              <option value="">Seleccione</option>
                           </select>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                      <label >Zona</label>
                          <select name="pzona" id="pzona" class="form-control">
                                <option value="Zona 1">Zona 1</option>
                                <option value="Zona 2">Zona 2</option>
                                <option value="Zona 3">Zona 3</option>
                           </select>
                    </div>
                </div>

                 <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                          <label for="consignado">Cantidad</label>
                             <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad...">
                    </div>
                </div>

                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
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


                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                      <label >Precio S/.</label>
                          <input type="number" name="pprecio" id="pprecio" class="form-control" placeholder="Precio...">
                    </div>
                </div>


                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                       <thead style="background-color: #B2FFFF">
                            <th>Opc</th>
                            <th>Consignado</th>
                            <th>Descripcion</th>
                            <th>T.Correspondencia</th>
                            <th>S.T.Correspondencia</th>
                            <th>Lugar</th>
                            <th>Peso</th>
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
                            <th></th>
                            <th><h4  id="total">S/. 0.0</h4></th>
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

$(document).ready(function(){
$("#porigen").on('change',function(event){
$.get("/ciudadesDestino/"+event.target.value+"", function(response, state){
    console.log(response);
    $("#pdestino").empty();
    for(i=0;i<response.length;i++){
      $("#pdestino").append("<option value'"+response[i].idciudad+"'>"+response[i].nombre+"</option>");
    }
        });

    });

});﻿

$(document).ready(function(){
$("#ptipo_comprobante").on('change',function(event){
$.get("/mostrarCorrelativo/"+event.target.value+"", function(response, state){
    console.log(response);
    $("#pcorrelativo").empty(); 
       $("#pcorrelativo").val(43243)
        });

    });

});﻿




















$(document).ready(function(){
$("#pidtipo_correspondencia").on('change',function(event){
$.get("/subCorrespondencias/"+event.target.value+"", function(response, state){
    console.log(response);
    $("#pidsub_tipo_correspondencia").empty();
    for(i=0;i<response.length;i++){
      $("#pidsub_tipo_correspondencia").append("<option value'"+response[i].idsub_tipo_correspondencia+"'>"+response[i].nombre+"</option>");
    }
        });

    });

});﻿






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
  consignado=$("#pconsignado").val();
  descripcion=$("#pdescripcion").val();

  idzona=$("#pidzona").val();
  zona=$("#pidzona option:selected").text();
  precio=$("#pprecio").val();

  idtipo_correspondencia=$("#pidtipo_correspondencia").val();
  tipo_correspondencia=$("#pidtipo_correspondencia option:selected").text();

  idsub_tipo_correspondencia=$("#pidsub_tipo_correspondencia").val();
  sub_tipo_correspondencia=$("#pidsub_tipo_correspondencia option:selected").text();

  cantidad=$("#pcantidad").val();
  descripcion=$("#pdescripcion").val();

  idpeso=$("#pidpeso").val();
  peso=$("#pidpeso option:selected").text();

  if (consignado!="" && descripcion!="" && idzona!="" && idsub_tipo_correspondencia!="" && cantidad!="") {
    subtotal[cont]=(cantidad*precio);
    total=total+subtotal[cont];
    var fila='<tr class="selected" id="fila'+cont+'"> <td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="text" name="consignado[]" value="'+consignado+'"></td><td><input type="text" name="descripcion[]" value="'+descripcion+'"></td><td><input type="hidden" name="idtipo_correspondencia[]" value="'+idtipo_correspondencia+'">'+tipo_correspondencia+'</td><td><input type="hidden" name="idsub_tipo_correspondencia[]" value="'+idsub_tipo_correspondencia+'">'+sub_tipo_correspondencia+'</td><td><input type="hidden" name="idzona[]" value="'+idzona+'">'+zona+'</td><td><input type="hidden" name="idpeso[]" value="'+idpeso+'">'+peso+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td>'+subtotal[cont]+'</td></tr>';
    cont++;
    limpiar();
    $("#total").html("S/. "+total);
    evaluar();
    $("#detalles").append(fila);
  }
  else{
    alert("Error al ingresar el detalle del ingreso, revise los datos del articulo ")
  }

}


function limpiar(){
  $("#pdescripcion").val("")
  $("#pcantidad").val("")
  $("#pprecio").val("")
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





</script>
@endpush

@endsection
