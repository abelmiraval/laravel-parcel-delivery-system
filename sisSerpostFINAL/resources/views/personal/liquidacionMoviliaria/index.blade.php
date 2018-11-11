@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Liquidaciones Moviliarias <a href="liquidacionMoviliaria/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('personal.liquidacionMoviliaria.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="tabla-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Trabajador</th>
						<th>Contrato</th>
						<th>Fecha Liquidacion</th>
						<th>Total</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thead>
					@foreach ($liquidaciones as $liquidacion)
					<tr>

						<td>{{$liquidacion->idliquidacion_movilidad}}</td>
						<td>{{$liquidacion->nombre.' '.$liquidacion->apell_paterno.''.$liquidacion->apell_materno}}</td>
						<td>{{$liquidacion->inicio_contrato.' hasta '.$liquidacion->fin_contrato}}</td>
						<td>{{$liquidacion->inicio.'  hasta  '.$liquidacion->fin}}</td>
						<td>{{$liquidacion->total}}</td>
						@if($liquidacion->estado==1)
					    <td>Liquidado</td>
					    @else
					    	<td>Proceso</td>
						@endif

						<td>
					    	<a href="{{URL::action('LiquidacionMoviliariaController@show',$liquidacion->idliquidacion_movilidad)}}"><button class="btn btn-primary">Detalles</button></a>
							
							@if($liquidacion->estado==0)
							<a href="{{URL::action('LiquidacionMoviliariaController@edit',$liquidacion->idliquidacion_movilidad)}}"><button class="btn btn-info">Agregar</button></a>

						
							<a href="" data-target="#modal-delete-{{$liquidacion->idliquidacion_movilidad}}" data-toggle="modal"><button class="btn btn-danger">Liquidar</button></a>
					  		@else
					  			<a href="{{URL::action('LiquidacionMoviliariaController@create',$liquidacion->idliquidacion_movilidad)}}"><button class="btn btn-success" disabled="true">Agregar</button></a>
						
							    <a href="" data-target="#modal-delete-{{$liquidacion->idliquidacion_movilidad}}" data-toggle="modal"><button class="btn btn-danger" disabled="true">Liquidar</button></a>
							 @endif   

							<a class="btn btn-success" href="{{ url('invoice1/pdf1/' . $liquidacion->idliquidacion_movilidad) }}">
                                <i class="fa fa-file-pdf-o"></i> Descargar
                            </a>  

                      	</td>
					</tr>

					@include('personal.liquidacionMoviliaria.modal')
					@endforeach
				</table>
			</div>
			{{$liquidaciones->render()}}
		</div>
	</div>
@endsection
