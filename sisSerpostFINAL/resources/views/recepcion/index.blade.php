@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Envios de Encomiendas <a href="envioEncomienda/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('envio.envioEncomienda.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="tabla-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Fecha</th>
						<th>Cliente</th>
						<th>Consignado</th>
						<th>Comprobante</th>
						<th>Impuesto</th>
						<th>Total</th>
						
						<th>Opciones</th>
					

					</thead>
					@foreach ($envios as $ec)
					<tr>

						<td>{{$ec->idenvio_encomienda}}</td>
						<td>{{$ec->fecha}}</td>
						<td>{{$ec->nombre.' '.$ec->apell_paterno.' '.$ec->apell_materno}}</td>
						<td>{{$ec->consignado}}</td>
						<td>{{$ec->tipo_comprobante.': '.$ec->serie.'-'.$ec->correlativo}}</td>
						<td>{{$ec->igv}}</td>
						<td>{{$ec->total}}</td>



						<td>
					    	<a href="{{URL::action('EnvioEncomiendaController@show',$ec->idenvio_encomienda)}}"><button class="btn btn-primary">Detalles</button></a>
					   
						   <a href="crear_reporte_envio_encomienda/1" target="_blank" onclick="cargarlistado(1);"><button class="btn btn-success">Ver</button></a>

                      	   <a href="crear_reporte_envio_encomienda/2" target="_blank" ><button class="btn btn-danger">Descargar</button></a>
                      	</td>
					</tr>

					@include('envio.envioEncomienda.modal')
					@endforeach
				</table>
			</div>
			{{$envios->render()}}
		</div>
	</div>
@endsection
