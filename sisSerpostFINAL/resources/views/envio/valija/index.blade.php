@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Valijas  <a href="valija/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('envio.valija.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="tabla-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Fecha</th>
						<th>Codigo De Valija</th>
						<th>Descripcion</th>
						<th>Estado</th>
						<th>Opciones</th>

					</thead>
					@foreach ($valijas as $valija)
					<tr>

						<td>{{$valija->fecha}}</td>
						<td>{{$valija->idvalija}}</td>
						<td>{{$valija->descripcion}}</td>
						@if($valija->estado=='1')
						<td>ENVIANDO</td>
						@else
							@if($valija->estado=='A')
						     <td>ALMACEN</td>
						    @endif
						@endif
						<td>
							<a href="{{URL::action('ValijaController@show',$valija->idvalija)}}"><button class="btn btn-primary">Detalles Valija</button></a>
							

						</td>
					</tr>

					@include('envio.valija.modal')
					@endforeach
				</table>
			</div>
			{{$valijas->render()}}
		</div>
	</div>
@endsection
