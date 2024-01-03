<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Happiness Asean Countries is a web application that provides information about happiness of ASEAN countries">
    <meta name="keywords" content="Happiness Asean Countries">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="/logo.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/logo.ico" type="image/x-icon">
    <title>{{ $title }} &mdash; HAC</title>

    @include('components.home.css')

    @stack('style')

    @livewireStyles
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="typewriter">
            <h1>New Era For Happiness..</h1>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <!-- Page Header Start-->
        @include('components.home.header')
        <!-- Page Header Ends -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <div class="page-body" style="margin-left: 0px">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6 main-header">
                                @yield('breadcrumb-title')
                            </div>
                            <div class="col-lg-6 breadcrumb-right">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                                class="pe-7s-home"></i></a></li>
                                    @yield('breadcrumb-items')
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content -->
                {{ $slot }}

            </div>
            <!-- footer start-->
            @include('components.home.footer')
        </div>
    </div>

    @include('components.home.script')
    @livewireScripts
    @stack('scripts')
</body>

</html>
