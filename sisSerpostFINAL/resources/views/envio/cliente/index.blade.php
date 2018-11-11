@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Clientes <a href="cliente/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('envio.cliente.search')
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
						<th>Opciones</th>
					</thead>
					@foreach ($personas as $cli)
					<tr>
						<td>{{$cli->idpersona}}</td>
						<td>{{$cli->nombre}}</td>
						<td>{{$cli->apell_paterno}}</td>
						<td>{{$cli->apell_materno}}</td>
						<td>{{$cli->tipo_documento}}</td>
						<td>{{$cli->numero_documento}}</td>
						<td>{{$cli->direccion}}</td>
						<td>{{$cli->telefono}}</td>

						<td>
							<a href="{{URL::action('ClienteController@edit',$cli->idpersona)}}"><button class="btn btn-info">Editar</button></a>


							<a href="" data-target="#modal-delete-{{$cli->idpersona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>
					</tr>
					@include('envio.cliente.modal')
					@endforeach
				</table>
			</div>
			{{$personas->render()}}
		</div>
	</div>
@endsection
