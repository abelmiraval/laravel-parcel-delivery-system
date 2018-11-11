@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Envios de Encomiendas <a href="envioEncomienda/create"><button id="pbtn-nuevo" class="btn btn-success">Nuevo</button></a></h3>
			@include('envio.envioEncomienda.search')
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="tabla-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Codigo</th>
						<th>Estado</th>
						<th>Fecha</th>
						<th>Cliente</th>			
						<th>Comprobante</th>
						<th>Impuesto</th>
						<th>Total</th>				
						<th>Opciones</th>
					

					</thead>
					@foreach ($envios as $ec)
					<tr>

						<td>{{$ec->codigo}}</td>
						<td>{{$ec->estado}}</td>
						<td>{{$ec->fecha}}</td>
						<td>{{$ec->nombre_cliente.' '.$ec->apell_paterno.' '.$ec->apell_materno}}</td>
						@if($ec->tipo_comprobante=='F')
						<td>{{$ec->tipo_comprobante.': '.$ec->serie.'-'.$ec->correlativo}}</td>
						@else
						   @if($ec->tipo_comprobante=='B')
						   		<td>{{$ec->tipo_comprobante.':'.$ec->numero_boleta}}</td>
						   @endif
						@endif   		
						<td>{{$ec->igv}}</td>
						<td>{{$ec->total}}</td>
						<td>

							
					    	<a href="{{URL::action('EnvioEncomiendaController@show',$ec->idenvio_encomienda)}}"><button class="btn btn-primary">Detalles</button></a>
					    	 <a class="btn btn-success" href="{{ url('invoice/pdf/' . $ec->idenvio_encomienda) }}">
                                <i class="fa fa-file-pdf-o"></i> Descargar
                            </a>                      		 
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
