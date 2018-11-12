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
<body class="loaded">
    <div class="main-wrapper">
        <div id="app" id="app">
        @guest
        <main class="py-4">
            <div class="col-md-12" >
                @include('fragment.respuesta')  
            </div>
            @yield('content') 
        </main>
                            
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
                            <span class="name">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
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
        <article class="content buttons-page">
            <div class="title-block">
                <h3 class="title"> TITULITO</h3>
                <P class="title-description"> descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion </P>
                
            </div>
            <section class="section">
                <div class="row sameheight-container">
                    <div class="col-md-12">
                        <div class="card sameheight-item" style="height: 177px;">
                            <div class="card-block">
                                <div class="card-title-block">
                                    <h3 class="title"> TITULITO</h3>
                                </div>
                                <section class="section">
                                    <p>Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. Aquí estaban los botenoes pero ps pa mi es una tabla. </p>
                                </section>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </section>

        </article>  
        <footer class="footer">
        </footer>
        <div class="footer-block buttons"></div>
        <div class="footer-block author"></div>
        @endguest
        </div>
    @yield('foot')
    </div>
</body>
</html>
