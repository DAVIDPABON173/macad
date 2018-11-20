<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'MACAD') }}</title>-->
    <title>MACAD</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/transeico.js') }}" defer></script>
    @yield('js')

    <!-- Fonts -->
    


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla.css') }}" rel="stylesheet">
    <link href="{{ asset('css/own.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="icon" type="image/x-icon" href="http://localhost/macad/public/img/logo.png">


</head>
<!--round-->
<body style="background-image: url('http://localhost/macad/public/img/bg-3.jpg'); background-repeat: no-repeat;background-size: cover;">
    
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
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">                            
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"> </div>
                                    <span class="name">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    localStorage.removeItem('active');
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar Sesion') }}
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
                                <img src="http://localhost/macad/public/img/logo.png" class="w-25 h-auto">
                                MACAD
                            </div>
                        </div>
                        <nav class="menu">
                            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                                <li id="categories">
                                    <a href="{{ route('categoria.index') }}">
                                        <i class="fas fa-network-wired"></i> CATEGORÍAS                                        
                                    </a>
                                </li>
                                <li id="doc_types">
                                    <a href="{{ route('documento.index') }}">
                                        <i class="fas fa-book"></i> TIPOS DE DOCUMENTOS
                                    </a>
                                </li>
                                <li id="files">
                                    <a href="{{ route('archivo.index') }}">
                                        <i class="fas fa-file-invoice"></i> ARCHIVOS
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <footer class="sidebar-footer">
                        <ul class="sidebar-menu metismenu" id="customize-menu">
                            <li>
                                <a href="">
                                    <i class=""></i> TRANSEICO SAS
                                </a>
                            </li>
                        </ul>
                    </footer>
                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content buttons-page">
                    @include('fragment.respuesta')  
                    @yield('content')
                </article>
                <footer class="footer">
                    <div class="footer-block buttons">
                    </div>
                    <div class="footer-block author">
                        <ul>
                            <li> Creado Por:
                                <a href="#">Jesús David Pabón</a>
                            </li>
                            <li>
                                <a href="#">2018</a>
                            </li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
        @endguest
</body>
</html>
