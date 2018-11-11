@extends ('layouts.admin')
@section ('contenido')
    
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>SEGUIMIENTO</h3>
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
 


 {!!Form::open(array('url'=>'seguimiento/seguimientoTrabajador','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="row">
      <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label for="codigo">Codigo Encomienda</label>
                        <input type="text" name="codigo" id="codigo" class="form-control"  placeholder="Codigo Encomienda...">
                    </div>
    
                 </div>  

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                      <label >Ubicacion</label>
                          <select name="iddepartamento" id="iddepartamento" class="form-control">
                                <option value="">Seleccione</option>
                                 @foreach($destinos as $destino)
                                    <option value="{{$destino->iddepartamento}}">{{$destino->destino}}</option>
                                  @endforeach
                           </select>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </div>
            </div>
      </div>
</div>
{!!Form::close()!!}
@endsection
