<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>medicalconsulting</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Styles -->
    @if(!Request::is(['login', 'register', 'inbox*',]))
        <link href="{{asset('/css/client/page.min.css')}}" rel="stylesheet">
        <link href="{{asset('/css/client/style.min.css')}}" rel="stylesheet">
    @endif
    @if(Request::is(['login', 'register', 'inbox*']))
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif
    @yield('styles')
    <style>
        .article {
            direction: rtl;
        }
    </style>
</head>
<body>
            @yield('log-reg-nav')
            @if(!Request::is(['login', 'register']))
                @section('top-main')
                    @include('partials.navbar')
                    @include('partials.header')
                @show
            @endif
            <div class="container">
                @if(session()->has('success'))
                    <div class="alert alert-success mt-4 lead">{{session()->get('success')}}</div>
                @endif
            </div>
        <main id="content">
            @yield('content')
        </main>
{{--            <script src="{{ asset('js/app.js') }}"></script>--}}
            @if(!Request::is(['login', 'register']))
                <script src="{{asset('js/client/page.min.js')}}"></script>
                <script src="{{asset('js/client/script.js')}}"> </script>
            @endif




            <!-- Footer -->
            @section('footer')
            <footer class="footer">
                <div class="container">
                    <div class="row gap-y align-items-center">

                        <div class="col-md-3 text-center text-md-left">
                            <a href="{{url('/')}}">صحتك</a>
                        </div>

                        <div class="col-md-6">
                            <div class="nav nav-center">
                                <a class="nav-link" href="{{route('ask.consult')}}">استشارة</a>
                                <a class="nav-link" href="#">الخصوصية</a>
                                <a class="nav-link" href="#">من نحن</a>
                                <a class="nav-link" href="#content">مقالات</a>
                            </div>
                        </div>

                        <div class="col-md-3 text-center text-md-right">
                            <small>© 2020. جميع الحقوق محفوظة .</small>
                        </div>
                    </div>
                </div>
            </footer><!-- /.footer -->
            @show
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

            @yield('scripts')
</body>
</html>
