@extends ('layouts.admin')
@section ('contenido')
<div class="row" >
   
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="form-group">
                        <label for="codigo">Codigo Encomienda</label>
                        <input type="text" name="codigo" id="codigo" class="form-control"  placeholder="Codigo Encomienda...">
                    </div>
                 </div> 

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="form-group">
                     <label >Buscar Paquete</label>
                     <br>
                        <button style="width: 100px;" id="btn-buscar" class="btn btn-success" type="submit">Buscar</button>
                    </div>
                </div> 

                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                    <div class="form-group">
                    <label for="estado">Ubicacion del paquete</label>
                        <input type="text" name="estado" id="estado" class="form-control"  placeholder="Ubicacion de la Encomienda..." disabled="true">
                    </div>
                </div>
        
</div>

<div class="row" >

       <div class="container">
        <br>
        <div class="col-md-10" style="margin-left: 8px;">   
          <div id="carousel-1" class="carousel slide" data-ride="carousel">
            <!-- Incicadores-->
            <ol class="carousel-indicators">
              <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-1" data-slide-to="1"></li>
              <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
             <!-- Contenedor de slide-->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="{{asset('img/1.jpg')}}"  width="800" height="1000">
                <div class="carousel-caption">
                </div>
              </div>
               <div class="item">
                <img src="{{asset('img/2.jpg')}}"  width="800" height="1000">
                <div class="carousel-caption">
                </div>
              </div>
               <div class="item">
                <img src="{{asset('img/3.jpg')}}"  width="800" height="1000">
                <div class="carousel-caption">
                </div>
              </div>
             <!-- Controles-->
            <a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
              <span class="fa fa-angle-left pull-left" aria-hide="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
              <span class="fa fa-angle-right pull-right" aria-hide="true"></span>
              <span class="sr-only">Siguiente</span>
            </a> 

            </div>
        
          </div>
        </div>
  </div>


{!!Form::close()!!}

@push('scripts')
<script >
$(document).ready(function(){
    $('#btn-buscar').click(function(){
        var data = { 
          'codigo' :  document.getElementById("codigo").value,
        }   
        console.log(data); 
        $.post('/buscarUbicacion',data ).success(function(data){
          console.log('Estos son los datos ',data[0])  
           $("#estado").val(data[0].estado);
        }); 
    });
});
</script>
 <script src=http://code.jquery.com/jquery-latest.js></script>      
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endpush
@endsection
