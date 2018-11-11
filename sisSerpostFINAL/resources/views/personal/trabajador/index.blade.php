@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de trabajadores <a href="trabajador/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('personal.trabajador.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="tabla-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Tipo de Documento</th>
						<th>N° Documento</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Contrato</th>
						<th>Opciones</th>
					</thead>
					@foreach ($personas as $trabajador)
					<tr>
						<td>{{$trabajador->idpersona}}</td>
						<td>{{$trabajador->nombre}}</td>
						<td>{{$trabajador->apell_paterno}}</td>
						<td>{{$trabajador->apell_materno}}</td>
						<td>{{$trabajador->tipo_documento}}</td>
						<td>{{$trabajador->numero_documento}}</td>
						<td>{{$trabajador->direccion}}</td>
						<td>{{$trabajador->telefono}}</td>
						<td>{{$trabajador->inicio_contrato.' hasta  '.$trabajador->fin_contrato}}</td>

						<td>
							<a href="{{URL::action('TrabajadorController@edit',$trabajador->idpersona)}}"><button class="btn btn-info">Editar</button></a>


							<a href="" data-target="#modal-delete-{{$trabajador->idpersona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>
					</tr>
					@include('personal.trabajador.modal')
					@endforeach
				</table>
			</div>
			{{$personas->render()}}
		</div>
	</div>
@endsection
