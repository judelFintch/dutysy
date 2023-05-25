<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts 
        @vite(['resources/css/app.css', 'resources/js/app.js'])-->

        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/alertify/alertify.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/lightbox/glightbox.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/c3-chart/c3.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins//toastr/toatr.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/fullcalendar.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote-bs4.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div >
            @livewire('navigation-menu')
            <!-- Page Heading -->
            @if (isset($header))
                <header>
                    <div >
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="main-wrapper">
                     {{ $slot }}
                </div>
            </main>
        </div>


 

        @stack('modals')

        @livewireScripts
        <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('assets/js/select2.min.js')}}"></script>
        <script src="{{asset('assets/js/moment.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/js/fullcalendar.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.fullcalendar.js')}}"></script>
        <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/js/validation.init.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
    </body>
</html>
