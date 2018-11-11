@extends ('layouts.admin')
@section ('contenido')
    <div class="row"><!--para agregar una fila -->
        <!-- -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Editar Departamento Entrega</h3>
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

{!!Form::model($departamentoEntrega,['method'=>'PATCH','route'=>['departamentoEntrega.update',$departamentoEntrega->iddepartamento_entrega]])!!} {{Form::token()}}

            <!-- token-->
<div class="row">

         <div class="col-lg6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Ciudad Origen</label>
                <select name="origen" class="form-control">
                    @foreach($departamentos as $c)
                        @if($c->iddepartamento== $departamentoEntrega->origen)
                            <option value="{{$c->iddepartamento}}" selected>{{$c->nombre}}</option>
                       @else 
                             <option value="{{$c->iddepartamento}}">{{$c->nombre}}</option>
                       @endif
                       

                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                 <label>Ciudad de Destino</label>
                 <select name="destino" class="form-control">
                    @foreach($departamentos as $c)
                        @if($c->iddepartamento==$departamentoEntrega->destino)
                            <option value="{{$c->iddepartamento}}" selected>{{$c->nombre}}</option>
                    @else 
                             <option value="{{$c->iddepartamento}}">{{$c->nombre}}</option>
                    @endif
                    @endforeach

                 </select>
            </div>
        </div>

        <div class="col-lg6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group" >
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
 </div>
{!!Form::close()!!}
@endsection
