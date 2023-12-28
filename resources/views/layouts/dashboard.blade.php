<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/core.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    @stack('meta')

    @stack('css')

    @livewireStyles
</head>

<body>
    <!-- Main navbar -->
    @include('layouts.components.navbar')
    <!-- /main navbar -->

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            @include('layouts.components.sidebar')
            <!-- /main sidebar -->

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    @stack('page-header')
                </div>
                <!-- /page header -->

                <!-- Content area -->
                <div class="content">
                    {{ $slot }}

                    <!-- Footer -->
                    @include('layouts.components.footer')
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <!-- /theme JS files -->
    @livewireScriptConfig

    @stack('js')
</body>

</html>
