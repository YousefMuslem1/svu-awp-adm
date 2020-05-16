@extends('layouts.app')
@section('log-reg-nav')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-5">
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

    <div class="container">
        <a href="{{url()->previous()}}" class="btn btn-success" style="width: 9rem"> <span class="fa fa-undo-alt"></span>عودة</a>
    </div>
    <div class="row justify-content-center m-0 mt-5">
        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    نظام المراسلات
                </div>
                <div class="card-body">
                    <h6 class="lead">
                        <span class="text-danger">عنوان الاستشارة : </span>
                        <p class=" d-inline">{{$consult->consult_add}}</p>
                        @if($consult->is_replayed)
                            <span class="badge badge-success">تم الرد</span>
                        @else
                            <span class="badge badge-danger">لم يتم الرد</span>
                        @endif
                    </h6>
                    <br>
                    <h6 class="lead">
                        <span class=" text-danger">تاريخ الاستشارة : </span>
                        <p class=" d-inline ">
                            {{date('F d, Y', strtotime($consult->created_at))}} at {{date('g:ia')}}
                        </p>
                    </h6>
                    <br>     <h6 class="lead">
                        <span class=" text-danger">المرسل : </span>
                        <p class=" d-inline ">{{$consult->user->name}}</p>
                    </h6>
                    <br>
                    <h6 class="lead">
                        <span class=" text-danger">العمر : </span>
                        <p class=" d-inline ">{{$consult->age}}</p>
                    </h6>
                    <br>
                    <h6 class="lead">
                        <span class=" text-danger">الجنس : </span>
                        <p class=" d-inline ">{{$consult->gender}}</p>
                    </h6>
                    <br>
                    <h6 class="lead">
                        <span class=" text-danger">التاريخ المرضي : </span>
                        <p class=" d-inline ">{!! $consult->dis_history !!}</p>
                    </h6>
                    <br>
                    <h6 class="lead">
                        <span class=" text-danger">نص الاستشارة : </span> <br>
                        <p class=" d-inline p-3 ml-5">{!! $consult->consult_body !!}</p>
                    </h6>
                    <h6 class="lead">
                        <span class=" text-danger">الرد : </span> <br>
                        @if($consult->is_replayed)
                            <p class=" d-inline p-3 ml-5 lead">{!! $consult->admin_replay !!}</p>
                        @else
                            <span class="badge badge-danger">لم يتم الرد</span>
                        @endif
                    </h6>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('top-main')
@endsection
