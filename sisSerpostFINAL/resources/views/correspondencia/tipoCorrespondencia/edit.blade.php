@extends ('layouts.admin')
@section ('contenido')
	<div class="row"><!--para agregar una fila -->
		<!-- -->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Editar Cliente: {{$tc->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

		{!!Form::model($tc,['method'=>'PATCH','route'=>['tipoCorrespondencia.update',$tc->idtipo_correspondencia]])!!} {{Form::token()}}
            <!-- token-->

            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$tc->nombre}}">
            </div>
			<div class="form-group">
            	<label for="apell_paterno">Descripcion</label>
            	<input type="text" name="descripcion" class="form-control" value="{{$tc->descripcion}}">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

        {!!Form::close()!!}
		</div>

	</div>
@endsection
