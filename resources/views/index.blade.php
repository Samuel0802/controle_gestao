<!doctype html>
<html lang="pt-br" data-bs-theme="auto">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
   
    <title>SISTEMA DE GESTÃO</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">


    @yield('styles') {{-- yield: fazer importação dos css --}}

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('icones/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('icones/favicon-32x32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('icones/favicon-16x16.png') }}" sizes="16x16" type="image/png">
    <link rel="manifest" href="{{ asset('icones/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('icones/safari-pinned-tab.svg') }}" color="#712cf9">
    <link rel="icon" href="{{ asset('icones/favicon.ico') }}">
     {{-- Dependencia toastr função de alert css --}}
     <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <meta name="theme-color" content="#712cf9">
   <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

</head>

<body>

    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow container-fluid" data-bs-theme="dark">
        <a class="navbar-brand me-0 px-3 fs-6 text-white" href="{{route('dashbord.index')}}">LOGO</a>
    
      {{-- BARRA DO MENU TOPO --}}
    
      
    </header>
    
    

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>

                    
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
             
                 @include('componetes.navegacao')   {{--criação de componetes --}}

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                @yield('content') {{-- content renderizar tudo o que eu  quero renderizar --}}
                 
            </main>
        </div>
    </div>
    </div>
</div>

    {{-- SCRIPT --}}
    @yield('script')  {{-- yield: fazer importação dos js --}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.blundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
    <script src="/js/dashboard.js"></script>
    <script src="/js/color-modes.js"></script>
    {{-- InputMask --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

    {{-- BlocUI loading --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>

    <script src="/js/projeto.js"></script>

     {{-- Dependencia toastr função de alert js --}}
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
   

</html>
