<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MACAD') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/transeico.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @guest
                            
        @else
        <header class="header">
            <div class="header-block header-block-collapse d-lg-none d-xl-none">
                <button class="collapse-btn" id="sidebar-collapse-btn">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            
            <div class="header-block header-block-nav">
                <ul class="nav-profile">
                    <li class="notifications new">
                    </li>
                    <li class="profile dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"> </div>
                            <span class="name"> JESUS DAVID PABON</span>
                        </a>
                        <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="login.html">
                                <i class=""></i> Logout </a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>

        
        <aside class="sidebar">
            <div class="sidebar-container">
                <div class="sidebar-header">
                    <div class="brand">
                        <div class="logo">
                        </div> MACAD </div>
                </div>
                <nav class="menu">
                    <ul class="sidebar-menu metismenu" id="sidebar-menu">
                        <li>
                            <a href="{{ route('categoria.index') }}">
                                <i class=""></i> Categoría </a>
                        </li>
                        <li>
                            <a href="{{ route('documento.index') }}">
                                <i class=""></i> Tipos de Documentos </a>
                        </li>
                        <li>
                            <a href="{{ route('archivo.index') }}">
                                <i class=""></i> Archivos </a>
                        </li>
                       
                    </ul>
                </nav>
            </div>
        </aside>   
        <main class="py-4">
            <div class="col-md-12" >
                @include('fragment.respuesta')  
                @yield('content')  
            </div>
            
        </main> 
        @endguest
        
    </div>
    

    @yield('foot')
</body>
</html>
