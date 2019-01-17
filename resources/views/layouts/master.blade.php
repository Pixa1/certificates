<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.10
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>S&T Certifikati</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.css">
 
    <!-- Main styles for this application-->
    <link href="/css/style.css" rel="stylesheet">
  
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.19/sorting/datetime-moment.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.19/dataRender/datetime.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip-utils/0.0.2/jszip-utils.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>

  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#"> S&T Certifikati
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>

      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
          @guest
          <a class="nav-link" href="{{ route('login') }}" aria-haspopup="true" aria-expanded="false">
              Login
          </a>
          @else
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }}
          </a>
          @endguest
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
            </form>
              
          </div>
        </li>
      </ul>

    </header>
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">

            <li class="nav-title">MENU</li>
            <li class="nav-item">
              <a class="nav-link" href="/">
                <i class="nav-icon far fa-list-alt"></i> Certifikati</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/create">
                <i class="nav-icon far fa-clipboard"></i> Dodaj novi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/storage/MCP_Cert_Paths_01_01_18.pdf">
                  <i class="nav-icon fas fa-bezier-curve"></i> MS Certification Path</a>
            </li>
            
          </ul>

        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <main class="main">

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
                @yield('content')

              <!-- /.col-->
            </div>
            <!-- /.row-->
          </div>
        </div>
      </main>

    </div>
    <footer class="app-footer">
        <div>
            <a href="http://www.snt.hr">Certifikati</a>
            <span>© 2019 S&T Hrvatska.</span>
        </div>
        <div class="ml-auto">
            <span>v 2.0</span>
        </div>

    </footer>
    <script src="/js/coreui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
    @stack('scripts')
  </body>
</html>
