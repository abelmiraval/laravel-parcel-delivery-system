@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Editar: {{$zona->nombre}}</h3>
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

{!!Form::model($zona,['method'=>'PATCH','route'=>['zona.update',$zona->idzona]])!!} {{Form::token()}}

<div class="row">
        <div class="col-lg6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$zona->nombre}}">
            </div>
        </div>


        <div class="col-lg6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" value="{{$zona->descripcion}}">
            </div>
        </div>


        <div class="col-lg6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                    <label>Origen - Destino</label>
                        <select name="idciudad_entrega" class="form-control">
                            @foreach($ciudad_entregas as $ciudad_entrega)
                                @if($ciudad_entrega->idciudad_entrega==$zona->idzona)
                                    <option value="{{$ciudad_entrega->idciudad_entrega}}" selected>{{$ciudad_entrega->origen.'-'.$ciudad_entrega->destino}}</option>
                                @else
                                    <option value="{{$ciudad_entrega->idciudad_entrega}}">{{$ciudad_entrega->origen.'-'.$ciudad_entrega->destino}}</option>
                                @endif

                            @endforeach

                        </select>
            </div>
         </div>


        <div class="col-lg6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
                    <label>Minimo - Maximo</label>
                        <select name="idpeso" class="form-control">
                            @foreach($pesos as $peso)
                                @if($peso->idpeso==$zona->idpeso)
                                    <option value="{{$peso->idpeso}}" selected>{{$peso->minimo.' hasta '.$peso->maximo}}</option>
                                @else
                                    <option value="{{$peso->idpeso}}" >{{$peso->minimo.' hasta '.$peso->maximo}}</option>
                                @endif

                            @endforeach

                        </select>
            </div>
         </div>

        <div class="col-lg6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="tarifa">Tarifa</label>
                <input type="text" name="tarifa" class="form-control" value="{{$zona->tarifa}}">
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

        </div>


</div>


{!!Form::close()!!}
@endsection
