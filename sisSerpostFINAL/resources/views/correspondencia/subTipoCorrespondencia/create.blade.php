@extends ('layouts.admin')
@section ('contenido')
    <div class="row"><!--para agregar una fila -->

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Agregar Sub Tipo de Correspondencia</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif


    {!!Form::open(array('url'=>'correspondencia/subTipoCorrespondencia','method'=>'POST','autocomplete'=>'off')) !!}
    {{Form::token()}}



         <div class="form-group">
                <label for="nombre">Nombre Sub Tipo Correspondencia</label>
                <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre ...">
        </div>

         <div class="form-group">
                <label>Tipo Correspondencia</label>
                <select name="idtipo_correspondencia" class="form-control">
                    @foreach($tipoCorrespondencias as $tc)
                        <option value="{{$tc->idtipo_correspondencia}}">{{$tc->nombre}}</option>
                    @endforeach

                </select>

         </div>

         <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion ...">
         </div>

         <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
         </div>

     {!!Form::close()!!}
    </div>
 </div>

@endsection
