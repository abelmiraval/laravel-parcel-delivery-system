@extends ('layouts.admin')
@section ('contenido')
	<div class="row"><!--para agregar una fila -->
		<!-- -->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Editar Centro Poblado:</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

		{!!Form::model($centro_poblado,['method'=>'PATCH','route'=>['centroPoblado.update',$centro_poblado->idcentro_poblado]])!!} {{Form::token()}}
            <!-- token-->


            <div class="form-group">
                <label>Distrito</label>
                <select name="iddistrito" class="form-control">
                    @foreach($distritos as $distrito)
                        @if($distrito->iddistrito== $centro_poblado->iddistrito)
                            <option value="{{$distrito->iddistrito}}" selected="true">{{$distrito->nombre}}</option>
                       @else 
                            <option value="{{$distrito->iddistrito}}">{{$distrito->nombre}}</option>
                       @endif
                       

                    @endforeach
                </select>
            </div>
            

            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$centro_poblado->nombre}}">
            </div>
			
			 <div class="form-group">
            	<label for="importe">Importe</label>
            	<input type="number" name="importe" class="form-control" value="{{$centro_poblado->importe}}">
            </div>
			
			

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection  