@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Sub Correspondencias <a href="subTipoCorrespondencia/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('correspondencia.subTipoCorrespondencia.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="tabla-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>

						<th>Id</th>
						<th>Nombre</th>
						<th>Tipo Correspondencia</th>
						<th>Descripcion</th>
						<th>Opciones</th>

					</thead>

					@foreach ($subTipoCorrespondencias as $stc)
					<tr>

						<td>{{$stc->idsub_tipo_correspondencia}}</td>
						<td>{{$stc->nombre}}</td>
						<td>{{$stc->tipo}}</td>
						<td>{{$stc->descripcion}}</td>

						<td>
							<a href="{{URL::action('SubTipoCorrespondenciaController@edit',$stc->idsub_tipo_correspondencia)}}"><button class="btn btn-info">Editar</button></a>


							<a href="" data-target="#modal-delete-{{$stc->idsub_tipo_correspondencia}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>

					</tr>

					@include('correspondencia.subTipoCorrespondencia.modal')
					@endforeach


				</table>

			</div>

			{{$subTipoCorrespondencias->render()}}
		</div>
	</div>
@endsection
