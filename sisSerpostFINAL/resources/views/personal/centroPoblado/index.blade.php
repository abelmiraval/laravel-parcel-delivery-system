@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Centro Poblados <a href="centroPoblado/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('personal.centroPoblado.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="tabla-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Distrito</th>
						<th>Nombre</th>
						<th>Importe</th>
						<th>Opciones</th>
					</thead>

					@foreach ($centro_poblados as $centro_poblado)
					<tr>
						<td>{{$centro_poblado->idcentro_poblado}}</td>
						<td>{{$centro_poblado->distrito}}</td>
						<td>{{$centro_poblado->nombre}}</td>
						<td>{{$centro_poblado->importe}}</td>

						<td>
							<a href="{{URL::action('CentroPobladoController@edit',$centro_poblado->idcentro_poblado)}}"><button class="btn btn-info">Editar</button></a>


							<a href="" data-target="#modal-delete-{{$centro_poblado->idcentro_poblado}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>

					</tr>
				<!-- -->

				 @include('personal.centroPoblado.modal')
				@endforeach
				</table>
			</div>
			{{$centro_poblados->render()}}
		</div>
	</div>
@endsection
