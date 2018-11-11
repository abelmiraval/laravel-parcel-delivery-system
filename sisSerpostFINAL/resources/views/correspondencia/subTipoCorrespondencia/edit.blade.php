@extends ('layouts.admin')
@section ('contenido')
    <div class="row"><!--para agregar una fila -->

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Editar Sub Tipo de Correspondencia: {{$subTipoCorrespondencia->nombre}}</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif



       {!!Form::model($subTipoCorrespondencia,['method'=>'PATCH','route'=>['subTipoCorrespondencia.update',$subTipoCorrespondencia->idsub_tipo_correspondencia]])!!} {{Form::token()}}
            <!-- token-->


        <div class="form-group">
                <label for="nombre">Nombre Sub Tipo Correspondencia</label>
                <input type="text" name="nombre" required value="{{$subTipoCorrespondencia->nombre}}" class="form-control">
        </div>

        <div class="form-group">
                <label>Tipo Correspondencia</label>
                <select name="idtipo_correspondencia" class="form-control">
                    @foreach($tipoCorrespondencias as $tc)

                        @if($tc->idtipo_correspondencia==$subTipoCorrespondencia->idtipo_correspondencia)
                        <option value="{{$tc->idtipo_correspondencia}}" selected>{{$tc->nombre}}</option>
                        @else
                        <option value="{{$tc->idtipo_correspondencia}}">{{$tc->nombre}}</option>
                        @endif
                    @endforeach
                </select>
         </div>

         <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" required value="{{$subTipoCorrespondencia->descripcion}}" class="form-control" >
         </div>

        <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
    {!!Form::close()!!}
    </div>
  </div>

@endsection
