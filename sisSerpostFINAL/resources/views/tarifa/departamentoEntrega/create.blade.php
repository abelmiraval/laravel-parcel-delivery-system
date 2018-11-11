@extends ('layouts.admin')
@section ('contenido')
    <div class="row"><!--para agregar una fila -->
        <!-- -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Nueva Departamento de Entrega</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

    {!!Form::open(array('url'=>'tarifa/departamentoEntrega','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <!-- token-->
     <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Departamento de Origen</label>
                        <select name="origen" class="form-control">
                            @foreach($departamentos as $departamento)
                                <option value="{{$departamento->iddepartamento}}">{{$departamento->nombre}}</option>
                            @endforeach

                        </select>

                </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Departamento de Destino</label>
                        <select name="destino" class="form-control">
                            @foreach($departamentos as $departamento)
                                <option value="{{$departamento->iddepartamento}}">{{$departamento->nombre}}</option>
                            @endforeach

                        </select>

                </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>

    </div>
{!!Form::close()!!}
@endsection
