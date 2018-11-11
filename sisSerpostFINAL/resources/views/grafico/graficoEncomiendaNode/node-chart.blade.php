@extends ('layouts.admin')
@section ('contenido')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pie Chart</title>
    <script src="{{asset('node_modules/chart.js/dist/Chart.bundle.js')}}"></script>
    <script src="{{asset('node_modules/chart.js/samples/utils.js')}}"></script>
</head>

<body>

   <!-- <div >
        <label>Fecha Inicial</label>
             <input type="date" name="pfecha-inicial" id="pfecha-inicial">
         <label>Fecha Final</label>
             <input type="date" name="pfecha-final" id="pfecha-final">    
         <button name="btn-ver" id="btn-ver" class="btn btn-success">Ver Cantidad</button>   

    </div>-->
    <div id="canvas-holder" style="width:40%; margin-left: 300px;" >
        <canvas id="chart-area" />
    </div>
  
    <script>
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                     @foreach ($pastel as $pastels)
                                 ['{{ $pastels->cantidad}}'],
                      @endforeach
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                @foreach ($pastel as $pastels)
                                 ['{{ $pastels->nombre.'  '.$pastels->cantidad}}'],
               @endforeach
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };

    

    var colorNames = Object.keys(window.chartColors);
   
    </script>


</body>

  
</html>
@push('scripts')
<script >
$(document).ready(function(){
    $('#btn-ver').click(function(){
        var data = { 
          'fecha-inicial' :  $("#pfecha-inicial").val(),
          'fecha-final' : $("#pfecha-final").val()
        }   
        console.log(data); 
        $.post('/fechaGraficoSub',data ).success(function(data){
          console.log('Estos son los datos ',data[0]);  
              $("#ptarifa").val(data[0].tarifa);
        }); 
    });
});
</script>
@endpush

@endsection