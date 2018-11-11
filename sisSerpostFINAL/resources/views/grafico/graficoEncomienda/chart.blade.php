@extends ('layouts.admin')
@section ('contenido')
<html>
  <head>
    <script type="text/javascript" src="{{asset('js/loader.js')}}"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Correspondencia', 'Cantidad'],
            @foreach ($pastel as $pastels)
              ['{{ $pastels->nombre}}', {{ $pastels->cantidad}}],
            @endforeach
        ]);

        var options = {
          title: 'Reportes de Envio de Correspondencias'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart')); 

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>


@endsection

