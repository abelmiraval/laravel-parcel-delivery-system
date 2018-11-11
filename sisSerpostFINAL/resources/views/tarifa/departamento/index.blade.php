@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Departamentos <a href="departamento/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('tarifa.departamento.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="tabla-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Opciones</th>
					</thead>

					@foreach ($departamentos as $departamento)
					<tr>
						<td>{{$departamento->iddepartamento}}</td>
						<td>{{$departamento->nombre}}</td>

						<td>
							<a href="{{URL::action('DepartamentoController@edit',$departamento->iddepartamento)}}"><button class="btn btn-info">Editar</button></a>


							<a href="" data-target="#modal-delete-{{$departamento->iddepartamento}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>

					</tr>
				<!-- -->

				 @include('tarifa.departamento.modal')
				@endforeach
				</table>
			</div>
			{{$departamentos->render()}}
		</div>
	</div>
@endsection
