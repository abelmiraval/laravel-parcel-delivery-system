@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Zona <a href="zona/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('tarifa.zona.search')
		</div>
	</div>


	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="tabla-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Origen - Destino</th>
						<th>Minimo - Maximo</th>
						<th>Tarifa</th>
						<th>Fecha</th>
						<th>Opciones</th>
					</thead>

					@foreach ($zonas as $zona)
					<tr>
						<td>{{$zona->idzona}}</td>
						<td>{{$zona->nombre}}</td>
						<td>{{$zona->descripcion}}</td>
						<td>{{$zona->origen.' - '.$zona->destino}}</td>
						<td>{{$zona->minimo.' hasta '.$zona->maximo}}</td>
						<td>{{'S/.' .$zona->tarifa}}</td>
						<td>{{$zona->fecha}}</td>

						<td>

							<!--<a href="{{URL::action('ZonaController@edit',$zona->idzona)}}"><button class="btn btn-info">Editar</button></a>-->

							<a href="" data-target="#modal-delete-{{$zona->idzona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>

					</tr>

				 @include('tarifa.zona.modal')
				@endforeach
				</table>
			</div>
			{{$zonas->render()}}
		</div>
	</div>
@endsection
