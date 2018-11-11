@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Correspondencias <a href="tipoCorrespondencia/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('correspondencia.tipoCorrespondencia.search')
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
				
					</thead>
					@foreach ($tipoCorrespondencias as $tc)
					<tr>
						<td>{{$tc->idtipo_correspondencia}}</td>
						<td>{{$tc->nombre}}</td>
						<td>{{$tc->descripcion}}</td>

						<td>
							<a href="{{URL::action('TipoCorrespondenciaController@edit',$tc->idtipo_correspondencia)}}"><button class="btn btn-info">Editar</button></a>
	
							
							<a href="" data-target="#modal-delete-{{$tc->idtipo_correspondencia}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>
				
					</tr>

				 @include('correspondencia.tipoCorrespondencia.modal')
				@endforeach
				</table>
			</div>	
			{{$tipoCorrespondencias->render()}}
		</div>
	</div>
@endsection