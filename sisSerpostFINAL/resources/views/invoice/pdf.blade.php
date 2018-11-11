<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>pdf envio encomienda</title>
    <!--<link rel="stylesheet" href="" media="all" />-->
 
  <body>
    <header class="clearfix">
     
      <h1>SERPOST - TOCACHE</h1>
  
      <div id="project">
        <div><span>Cliente: </span>{{$envio_encomienda->nombre_cliente}} </div>
         @if($envio_encomienda->tipo_comprobante=='B')
                   <div><span>Tipo Comprobante: </span> Boleta</div>
         @else
                    <div><span>Tipo Comprobante: </span> Factura</div>
        @endif

        @if($envio_encomienda->estado=='E')
                    <div><span>Estado: </span> Envio</div>
        @else
                  @if($envio_encomienda->estado=='R')
                          <div><span>Estado: </span> Recepcion</div>
                  @else
                            @if($envio_encomienda->estado=='1')
                                  <div><span>Estado: </span> Enviando</div>
                            @endif
                  @endif        
        @endif

        @if($envio_encomienda->tipo_comprobante=='F')  
         <div><span>Serie: </span> {{$envio_encomienda->serie}}</div>           
        @endif  

        @if($envio_encomienda->tipo_comprobante=='F')
                  <div><span>Correlativo: </span> {{$envio_encomienda->correlativo}}</div>       
        @else
                  @if($envio_encomienda->tipo_comprobante=='B')
                       <div><span>Numero Comprobante: </span> {{$envio_encomienda->numero_boleta}}</div>
                  @endif
        @endif  


      </div>
      <br>
      <br>
      <br>
    </header>
<main>
      <table style=" font-size:15px;" >
        <thead>
          <tr>
              <th>Consignado</th>
              <th>Descripcion</th>
              <th>Correspondencia</th>
              <th>Lugar</th>
              <th>Peso Envio</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Sub Total</th>
          </tr>
        </thead>
        <tbody>
           @foreach($detalles as $detalle)
                          <tr>
                            <td>{{$detalle->consignado}}</td>
                            <td>{{$detalle->descripcion}}</td>
                            <td>{{$detalle->nombre_correspondencia}}</td>
                            <td>{{$detalle->origen.'-'.$detalle->destino.'-'.$detalle->nombre}}</td>
                            <td>{{$detalle->minimo.' hasta '.$detalle->maximo}}</td>
                            <td>{{$detalle->tarifa}}</td>
                            <td>{{$detalle->cantidad}}</td>
                            <td>{{$detalle->tarifa*$detalle->cantidad}}</td>
                          </tr>
       @endforeach
        </tbody>
        <br>
         <div><span>Total: </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$envio_encomienda->total}}</div> 
      @if($envio_encomienda->tipo_comprobante=='F')
   
         <div><span>IGV: </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$envio_encomienda->total-$envio_encomienda->total/1.18}}</div>   
      @endif   
      </table>
</main>
    <footer>

      <br>
      <br>
        <!--<div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      
        <div><span>Tipo Comprobante: </span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> September 17, 2015</div>-->


    </footer>
  </body>
</html>