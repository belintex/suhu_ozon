<!doctype html>
<html lang="en">
   <head>
      <title>TA</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
      <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
      <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
      {{-- 
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
      --}}
   </head>
   <body>
    <div id="app">
      <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="sticky">
                <div class="custom-menu">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    </button>
                </div>
                
                @guest
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                    <a href="{{ url('/') }}"><span class="fa fa-home mr-3"></span> Home</a>
                    </li>
                    <li class="active">
                    <a href="{{ route('login') }}"><span class="fa fa-sign-in mr-3"></span> Sign In</a>
                    </li>
                    <li class="active">
                    <a href="{{ route('register') }}"><span class="fa-solid fa-book mr-3"></span> Register</a>
                    </li>
                    <li class="active">
                    <a href="{{ url('/about') }}"><span class="fas fa-address-card mr-3"></span> About Us</a>
                    </li>
                </ul>
                @else
                <div class="img bg-wrap text-center py-4" style="background-image: url(front/images/bg_1.jpg);">
                    <div class="user-logo">
                    <div class="img" style="background-image: url(front/images/images.png);"></div>
                    <h3>{{ Auth::user()->name }}</h3>
                    </div>
                </div>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                    <a href="{{ url('/') }}"><span class="fa fa-home mr-3"></span> Home</a>
                    </li>
                    <li class="active">
                    <a href="{{ url('/dashboard') }}"><span class="fas fa-th-large mr-3 notif"></span> Dashboard</a>
                    </li>
                    <li class="active">
                    <a href="{{ url('/suhu') }}"><span class="fas fa-chart-bar mr-3"></span> Tabel Suhu</a>
                    </li>
                    <li class="active">
                    <a href="{{ url('/ozon') }}"><span class="fas fa-chart-bar mr-3"></span> Tabel Ozon</a>
                    </li>
                    <li class="active">
                    <a href="{{ url('/about') }}"><span class="fas fa-address-card mr-3"></span> About Us</a>
                    </li>
                    <li class="active">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><span class="fa fa-sign-out mr-3"></span>
                    {{ __('Sign Out') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                    </li>
                </ul>
                @endguest
            </div>
        </nav>
        @yield('content')
      </div>
    </div>
      <!-- Page Content  -->
      {{-- 
      <div id="content" class="p-4 p-md-5 pt-5">
      </div>
      --}}
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="{{ asset('front/js/popper.js') }}"></script>
      <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
      <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
      <script src="{{ asset('front/js/main.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
      <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
      <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
      @yield('script')
   </body>
</html>