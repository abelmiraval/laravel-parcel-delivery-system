@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Pesos <a href="peso/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('tarifa.peso.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="tabla-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Peso Minimo</th>
						<th>Peso Maximo</th>
						<th>Fecha</th>
						<th>Opciones</th>
					</thead>
					@foreach ($pesos as $peso)
					<tr>
						<td>{{$peso->idpeso}}</td>
						<td>{{$peso->nombre}}</td>
						<td>{{$peso->minimo}}</td>
						<td>{{$peso->maximo}}</td>
						<td>{{$peso->fecha}}</td>

						<td>
							<a href="{{URL::action('PesoController@edit',$peso->idpeso)}}"><button class="btn btn-info">Editar</button></a>


							<a href="" data-target="#modal-delete-{{$peso->idpeso}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>
					</tr>

				@include('tarifa.peso.modal')
				@endforeach
				</table>
			</div>

		</div>
	</div>
@endsection
