<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <style type="text/css">
    @font-face {
      font-family: yekan;
      src: url('{{secure_asset('assets/Yekan.ttf')}}');
    }
    p{direction: rtl;text-align: right;}
    h1,h2,h3,h4,h5,h6{font-family: yekan !important;}
    *{font-family: yekan,tahoma;}
  </style>



  <!-- Fonts -->

  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css" rel="stylesheet"> -->
  <!-- Styles -->
  <!-- <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet"> -->
  <link href="{{ secure_asset('assets/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet">

</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-lg bg-primary">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          IRAN FOOD
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                  </li> -->
                                  @endif
                                  @else
                                  <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                       <a class="dropdown-item" href="{{ route('recipes.index') }}"
                                      
                                    >مدیریت</a>
                                    <a class="dropdown-item" href="{{ route('home') }}"
                                      
                                    >مشاهده سایت</a>
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                    </a>
                                   

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                    </form>
                                  </div>
                                </li>
                                @endguest
                              </ul>
                            </div>
                          </div>
                        </nav>

                        <main class="py-4"  dir="rtl" >
                          @yield('content')
                        </main>
                      </div>
                      <!-- Scripts -->
                      <!-- <script src="{{ secure_asset('assets/js/app.js') }}" defer></script> -->
    <!-- <script src="{{ secure_asset('assets/js/core/jquery.min.js') }}" ></script>
      <script src="{{ secure_asset('assets/js/plugins/jasny-bootstrap.min.js') }}" ></script> -->


      <!--   Core JS Files   -->
      <script src="{{ secure_asset('assets/js/core/jquery.min.js') }}"></script>
      <script src="{{ secure_asset('assets/js/core/popper.min.js') }}"></script>
      <script src="{{ secure_asset('assets/js/core/bootstrap-material-design.min.js') }}"></script>
      <script src="{{ secure_asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
      <!-- Plugin for the momentJs  -->
      <script src="{{ secure_asset('assets/js/plugins/moment.min.js') }}"></script>
      <!--  Plugin for Sweet Alert -->
      <script src="{{ secure_asset('assets/js/plugins/sweetalert2.js') }}"></script>
      <!-- Forms Validations Plugin -->
      <script src="{{ secure_asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
      <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
      <script src="{{ secure_asset('assets/js/plugins/jquery.bootstrap-wizard.js') }}"></script>
      <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
      <script src="{{ secure_asset('assets/js/plugins/bootstrap-selectpicker.js') }}"></script>
      <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
      <script src="{{ secure_asset('assets/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
      <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
      <script src="{{ secure_asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
      <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
      <script src="{{ secure_asset('assets/js/plugins/bootstrap-tagsinput.js') }}"></script>
      <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
      <script src="{{ secure_asset('assets/js/plugins/jasny-bootstrap.min.js') }}"></script>
      <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
      <script src="{{ secure_asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
      <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
      <script src="../../assets/js/plugins/jquery-jvectormap.js') }}"></script>
      <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
      <script src="{{ secure_asset('assets/js/plugins/nouislider.min.js') }}"></script>
      <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
      <!-- Library for adding dinamically elements -->
      <script src="{{ secure_asset('assets/js/plugins/arrive.min.js') }}"></script>
      <!--  Google Maps Plugin    -->
      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
      <!-- Chartist JS -->
      <script src="{{ secure_asset('assets/js/plugins/chartist.min.js') }}"></script>
      <!--  Notifications Plugin    -->
      <script src="{{ secure_asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
      <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="{{ secure_asset('assets/js/material-dashboard.js?v=2.1.2') }}" type="text/javascript"></script>

    </body>
    </html>
