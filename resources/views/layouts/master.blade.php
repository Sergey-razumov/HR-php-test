<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Test PHP - @yield('title')</title>
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        <script src="{{ asset('/js/app.js') }}"></script>
        <script src="{{ asset('/js/script.js') }}"></script>
    </head>
    <body>
        @section('header')
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{route('order.list')}}">Test PHP</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{route('order.list')}}">Orders</a></li>
                            <li><a href="{{route('product.list')}}">Products</a></li>
                            <li><a href="{{route('weather')}}">Weather</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        @show

        <div class="container">
            @yield('content')
        </div>

        @section('footer')

        @show
    </body>
</html>
