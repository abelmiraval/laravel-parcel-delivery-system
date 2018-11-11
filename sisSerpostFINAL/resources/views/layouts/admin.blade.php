<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Encomiendas-Tocache</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> 
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skinsfolder instead of downloading all of them to reduce the load.
     -->
    <!--agregamo asset para decirle que estan en public-->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <style>
html, body { display: block; }


    </style>
  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>E</b>T</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ENCOMIENDAS</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- User Account: style can be found in dropdown.less -->
              <li>           
                <a href="{{ url('/logout') }}" 
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i> SALIR
               </a>
                <form id="logout-form" 
                  action="{{ url('/logout') }}" 
                  method="POST" 
                  style="display: none;">
                              {{ csrf_field() }}
                </form>
            </li>
          </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-envelope"></i>
                <span>Seguimiento Envio</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('seguimiento/seguimientoCliente')}}"><i class="fa fa-circle-o"></i>Seguimiento Paquete</a></li>               
              </ul>
            </li> 
            @if (auth::user()->tipo_usuario!='0')
             <li class="treeview">
              <a href="#">
                <i class="fa fa-check-square"></i>
                <span>Actualizar Ubicacion</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('seguimiento/seguimientoTrabajador')}}"><i class="fa fa-circle-o"></i>Actualizar Ubicacion</a></li>
              </ul>
            </li>
            @endif
             @if (auth::user()->tipo_usuario=='1')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i>
                <span>Datos Estadisticos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('grafico/graficoEncomienda')}}"><i class="fa fa-circle-o"></i>Grafico Envio Encomiendas</a></li>
              <li><a href="{{url('grafico/graficoEncomiendaNode')}}"><i class="fa fa-circle-o"></i>Grafico Envio</a></li>
              </ul>
            </li>  
             @endif  
           @if (auth::user()->tipo_usuario=='1')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list-alt"></i>
                <span>Correspondecia</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('correspondencia/tipoCorrespondencia')}}"><i class="fa fa-circle-o"></i>Tipo de Correspondecia</a></li>
                <li><a href="{{url('correspondencia/subTipoCorrespondencia')}}" onclick=""><i class="fa fa-circle-o"></i> Sub tipo de Correspondencia</a></li>
              </ul>
            </li>
          @endif
          @if (auth::user()->tipo_usuario=='1')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-usd"></i>
                <span>Tarifa</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('tarifa/departamento')}}"><i class="fa fa-circle-o"></i> Departamentos</a></li>
                <li><a href="{{url('tarifa/departamentoEntrega')}}"><i class="fa fa-circle-o"></i> Departamentos Entrega</a></li>
                <li><a href="{{url('tarifa/peso')}}"><i class="fa fa-circle-o"></i> Peso</a></li>
                <li><a href="{{url('tarifa/zona')}}"><i class="fa fa-circle-o"></i> Zona Entrega</a></li>
         
              </ul>
            </li>
            @endif
      @if (auth::user()->tipo_usuario!='0')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Envios</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('envio/cliente')}}"><i class="fa fa-circle-o"></i> Clientes</a></li>
                <li><a href="{{url('envio/envioEncomienda')}}"><i class="fa fa-circle-o"></i>Envio de Encomienda</a></li>
                <li><a href="{{url('envio/valija')}}"><i class="fa fa-circle-o"></i>Valija</a></li>
              </ul>
            </li>
        @endif    
       @if (auth::user()->tipo_usuario=='1') 
             <li class="treeview">
              <a href="#">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Personal</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('personal/trabajador')}}"><i class="fa fa-circle-o"></i> Trabajadores</a></li>
                <li><a href="{{url('personal/liquidacionMoviliaria')}}"><i class="fa fa-circle-o"></i> Liquidacion de Movilidad</a></li>
                <li><a href="{{url('personal/centroPoblado')}}"><i class="fa fa-circle-o"></i>Centro Poblado</a></li>
                
              </ul>
            </li>
       @endif     
       @if (auth::user()->tipo_usuario=='1') 
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('seguridad/usuario')}}"><i class="fa fa-circle-o"></i> Usuarios</a></li>

              </ul>
            </li>
    @endif
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
    
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema Serpost</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                                <!--Una vista dinamica, le voy a decir a laravel que cuando hago referencia a esta plantilla
                                blade pueda agregar un seccion contenido-->
                              @yield('contenido')
                              <!--Fin Contenido-->
                           </div>
                        </div>

                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contensido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b>
        </div>
        <strong>UNAS - <a href="#">Ing. Software II</a></strong>
      </footer>
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Para agregar codigo java script a cualquiera de las vistas-->
    @stack('scripts')<!-- la funcion stack de laravel -->
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
    <script src="{{asset('js/sis-serpost.js')}}"></script>
  
  </body>

</html>
