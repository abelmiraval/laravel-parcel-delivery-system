@extends ('layouts.admin')
@section ('contenido')
<div class="row"><!--para agregar una fila -->

    <!-- -->
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h3>Nuevo Trabajador</h3>
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

{!!Form::open(array('url'=>'personal/trabajador','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
            <!-- token-->
<div class="row">

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre...">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <div class="form-group">
                <label for="apell_paterno">Apellido Paterno</label>
                <input type="text" name="apell_paterno" class="form-control" placeholder="Apellido Paterno...">
            </div>
        </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                <label for="apell_materno">Apellido Materno</label>
                <input type="text" name="apell_materno" class="form-control" placeholder="Apellido Materno...">
            </div>
        </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                    <label>Tipo de Documento</label>
                    <select name="tipo_documento" class="form-control">
                        <option value="DNI">DNI</option>
                        <option value="RUC">RUC</option>
                        <option value="PAS">PAS</option>
                    </select>

            </div>

        </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
                <label for="num_documento">N° Documento</label>
                <input type="text" name="numero_documento" class="form-control" placeholder="N° Documento...">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="Direccion...">
            </div>

        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="direccion">Telefono</label>
                <input type="text" name="telefono" class="form-control" placeholder="Telefono...">
            </div>
        </div>    

        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="inicio">Inicio de Contrato</label>
                <input type="date" name="inicio_contrato" class="form-control">
            </div>    
        </div>

        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="direccion">Fin de Contrato</label>
                <input type="date"" name="fin_contrato" class="form-control">
             </div>   
        </div>


        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
              <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger" type="reset">Cancelar</button>
              </div>
        </div>


</div>
{!!Form::close()!!}
@endsection
