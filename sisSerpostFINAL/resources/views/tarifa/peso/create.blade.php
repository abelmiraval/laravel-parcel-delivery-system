@extends ('layouts.admin')
@section ('contenido')


    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h3>Nuevo Peso</h3>
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

   {!!Form::open(array('url'=>'tarifa/peso','method'=>'POST','autocomplete'=>'off'))!!}
   {{Form::token()}}


    <div class="row">

         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

            <div class="form-group">
                <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre...">
             </div>

        </div>


         <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label for="minimo">Peso Minimo</label>
                        <input type="text" class="form-control" name="minimo" placeholder="Peso minimo...">

                 </div>

        </div>

        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label for="metrica1">Metrica</label>
                        <select name="metrica1" class="form-control">
                                <option value="grs">grs</option>
                                <option value="kg">kg</option>
                                <option value="t">t</option>
                        </select>
                 </div>
        </div>

         <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                 <div class="form-group">
                    <label for="maximo">Peso Maximo</label>
                        <input type="text" class="form-control" name="maximo" placeholder="Peso maximo...">
                 </div>

         </div>

        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                 <div class="form-group">
                    <label for="metrica2">Metrica</label>
                        <select name="metrica2" class="form-control">
                                <option value="grs">grs</option>
                                <option value="kg">kg</option>
                                <option value="t">t</option>

                       </select>
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
