@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Departamento de Entrega<a href="departamentoEntrega/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('tarifa.departamentoEntrega.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="tabla-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Ciudad de Origen</th>
						<th>Ciudad de Destino</th>
						<th>Opciones</th>
					</thead>

					@foreach ($departamento_entregas as $departamento)
					<tr>
						<td>{{$departamento->iddepartamento_entrega}}</td>
						<td>{{$departamento->origen}}</td>
						<td>{{$departamento->destino}}</td>
						<td>

							<a href="{{URL::action('DepartamentoEntregaController@edit',$departamento->iddepartamento_entrega)}}"><button class="btn btn-info">Editar</button></a>

							<a href="" data-target="#modal-delete-{{$departamento->iddepartamento_entrega}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>

					</tr>

				 @include('tarifa.departamentoEntrega.modal')
				@endforeach
				</table>
			</div>
			{{$departamento_entregas->render()}}
		</div>
	</div>
@endsection
