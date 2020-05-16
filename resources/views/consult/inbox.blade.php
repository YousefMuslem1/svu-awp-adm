@extends('layouts.app')

@section('styles')
    <style>
        .navbar{position: relative; top: 0; direction: rtl}

    </style>
@endsection

@section('log-reg-nav')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-primary" href="{{ url('/') }}">
                صحتك
            </a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('inbox')}}">صندوق المراسلات</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('ask.consult')}}" target="_blank">طلب استشارة</a>
                </li>
            </ul>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">إنشاء حساب</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    تسجيل خروج
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
        <div class="container mt-5">
            @foreach($messages as $message)
                <div class="row">
                    <div class="col-md-8">
                        <ul class="list-group" >
                            <li class="list-group-item lead mb-2">
                                <h6 class="m-0 p-0"><a href="#" class="m-0 p-0">{{$message->consult_add}}</a></h6>
                                <span class="m-0 p-0" style="font-size: .7rem">
                            <i class="fas fa-history"></i>
                            {{date('F d, Y', strtotime($message->created_at))}} at {{date('g:ia')}}
                        </span><br>
                                <p><span class="text-info"> المرسل : </span> {{$message->user->name}}</p>
                                <h6>
                                    <span class="text-secondary">الحالة : </span>
                                    <span class="text-danger">
                                @if(!$message->is_replayed)  لم يتم الرد بعد
                                        @else  <span class="text-success"> تم الرد</span>
                                @endif</span>
                                </h6>
                                <a href="{{route('inbox.message', $message->id)}}" class="btn btn-success float-left">تفاصيل</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
@endsection


@section('top-main')
@endsection
@section('footer')
@endsection
