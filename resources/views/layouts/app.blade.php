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
    
        @guest
        <div id="app" id="app">
        <main class="py-4">
            <div class="col-md-12" >
                @include('fragment.respuesta')  
            </div>
            @yield('content') 
        </main>
        </div>
        @else
       <div class="main-wrapper">
            <div class="app" id="app">
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
                                    <span class="name">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <div class="">
                                </div> MACAD </div>
                        </div>
                        <nav class="menu">
                            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                                <li>
                                    <a href="{{ route('categoria.index') }}">
                                        <i class=""></i> CATEGORÍAS
                                        <i class=""></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('documento.index') }}">
                                        <i class=""></i> TIPOS DE DOCUMENTOS
                                        <i class=""></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('archivo.index') }}">
                                        <i class=""></i> ARCHIVOS
                                        <i class=""></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <footer class="sidebar-footer">
                        <ul class="sidebar-menu metismenu" id="customize-menu">
                            <li>
                                <a href="">
                                    <i class="fa fa-cog"></i> TRANSEICO SAS </a>
                            </li>
                        </ul>
                    </footer>
                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content buttons-page">
                    @yield('content')
                </article>
                <footer class="footer">
                    <div class="footer-block buttons">
                    </div>
                    <div class="footer-block author">
                        <ul>
                            <li> Creado Por:
                                <a href="https://github.com/modularcode">Jesús David Pabón</a>
                            </li>
                            <li>
                                <a href="">2018</a>
                            </li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
        @endguest
</body>
</html>
