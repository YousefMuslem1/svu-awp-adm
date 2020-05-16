<nav class="navbar navbar-expand-lg  navbar-dark " data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            @if(!Request::is(['login', 'register']))
                <button class="navbar-toggler" type="button">&#9776;</button>
            @endif
            <a class="navbar-brand text-warning" style="font-weight: bolder" href="{{url('/')}}">
                صحتك
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <ul class="nav nav-navbar">
                <li class="nav-item">
                    <a class="nav-link" href="#">الأقسام <span class="arrow"></span></a>
                    <ul class="nav">
                        <li class="nav-item">
                                @foreach($categories as $category)
                                    <a class="nav-link" href="{{route('show.categories.articles', $category->id)}}">{{$category->name}}</a>
                                @endforeach
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('ask.consult')}}">طلب استشارة</a>
                </li>
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('inbox')}}">صندق المراسلات </a>
                    </li>
                @endif
            </ul>
            <ul class="nav nav-navbar ml-auto">
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
                            <a class="dropdown-item" href="#">
                                ملفي الشخصي
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </section>


    </div>
</nav><!-- /.navbar -->
