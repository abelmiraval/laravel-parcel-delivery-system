@extends ('layouts.admin')
@section ('contenido')
    <div class="row"><!--para agregar una fila -->
        <!-- -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Editar Trabajador: {{$persona->nombre}}</h3>
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

        {!!Form::model($persona,['method'=>'PATCH','route'=>['trabajador.update',$persona->idpersona]])!!} {{Form::token()}}
            <!-- token-->
    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$persona->nombre}}" placeholder="Nombre...">
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="apell_paterno">Apellido Paterno</label>
                <input type="text" name="apell_paterno" class="form-control" value="{{$persona->apell_paterno}}" placeholder="Apellido Paterno...">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <div class="form-group">
                <label for="apell_materno">Apellido Materno</label>
                <input type="text" name="apell_materno" class="form-control" value="{{$persona->apell_materno}}" placeholder="Apellido Materno...">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
                    <label>Tipo de Documento</label>
                    <select name="tipo_documento" class="form-control">
                        @if($persona->tipo_documento=='DNI')
                              <option value="DNI" selected>DNI</option>
                              <option value="RUC" >RUC</option>
                              <option value="PAS" >PAS</option>
                               @elseif($persona->tipo_documento=='RUC')
                                  <option value="DNI" >DNI</option>
                                  <option value="RUC" selected>RUC</option>
                                  <option value="PAS" >PAS</option>
                                  @elseif($persona->tipo_documento=='PAS')
                                      <option value="DNI" >DNI</option>
                                      <option value="RUC" >RUC</option>
                                      <option value="PAS" selected>PAS</option>

                        @endif
                    </select>
            </div>
        </div>

         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="numero_documento">N° de Documento</label>
                <input type="text" name="numero_documento" class="form-control" value="{{$persona->numero_documento}}">
            </div>
        </div>


        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" class="form-control" value="{{$persona->direccion}}" placeholder="Direccion...">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" value="{{$persona->telefono}}" placeholder="Telefono...">
            </div>      
        </div>
        
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="inicio_contrato">Inicio de Contrato</label>
                <input type="date" name="inicio_contrato" class="form-control" value="{{$persona->inicio_contrato}}">
            </div>      
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="form-group">
                <label for="fin_contrato">Fin de Contrato</label>
                <input type="date" name="fin_contrato" class="form-control" value="{{$persona->fin_contrato}}">
            </div>      
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>    
</div>
{!!Form::close()!!}
@endsection
