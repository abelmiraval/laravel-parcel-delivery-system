@extends ('layouts.admin')
@section ('contenido')
<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Nueva Zona</h3>
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

{!!Form::open(array('url'=>'tarifa/zona','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
            <!-- token-->

<div class="row">

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                      <label >Zona</label>
                          <select name="nombre" id="nombre" class="form-control">
                                <option value="Zona 1">Zona 1</option>
                                <option value="Zona 2">Zona 2</option>
                                <option value="Zona 3">Zona 3</option>
                           </select>
                    </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Descripcion...">
            </div>
        </div>


     


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
                    <label>Minimo - Maximo</label>
                        <select name="idpeso" class="form-control">
                            @foreach($pesos as $peso)
                                <option value="{{$peso->idpeso}}">{{$peso->minimo.' hasta '.$peso->maximo}}</option>
                            @endforeach
                        </select>
            </div>
         </div>

           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                    <label>Origen - Destino</label>
                        <select name="iddepartamento_entrega" class="form-control selectpicker" data-live-search="true">
                            @foreach($departamentos_entrega as $departamento_entrega)
                                <option value="{{$departamento_entrega->iddepartamento_entrega}}">{{$departamento_entrega->origen.'-'.$departamento_entrega->destino}}</option>
                            @endforeach

                        </select>
            </div>
         </div>
         
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="tarifa">Tarifa</label>
                <input type="number" name="tarifa" step="any" class="form-control" placeholder="Tarifa...">
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
@push('scripts')
<script >

</script>
@endpush
@endsection
