<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>TheSaaS — Blog with sidebar</title>

    <!-- Styles -->
    <link href="{{asset('css/client/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/client/style.min.js')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-touch-icon.png">
    <link rel="icon" href="../assets/img/favicon.png">

    <style>
        nav {
            font-size: 1.2rem;
        }
    </style>
</head>

<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="{{url('/')}}">
                صحتك
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <ul class="nav nav-navbar">
                <li class="nav-item">
                    <a class="nav-link" href="#">Demos <span class="arrow"></span></a>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">SaaS <span class="arrow"></span></a>
                            <nav class="nav">
                                <a class="nav-link" href="../demo/saas-1.html">SaaS 1</a>
                                <a class="nav-link" href="../demo/saas-2.html">SaaS 2</a>
                            </nav>
                        </li>
                    </ul>
                </li>
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


<!-- Header -->


<!-- Main Content -->
<main class="main-content">
    <div class="section bg-gray">
        <div class="container">
            <div class="row">


                <div class="col-md-8 col-xl-9">
                    <div class="row gap-y">

                        <div class="col-md-6">
                            <div class="card border hover-shadow-6 mb-6 d-block">
                                <a href="#"><img class="card-img-top" src="../assets/img/thumb/1.jpg" alt="Card image cap"></a>
                                <div class="p-6 text-center">
                                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">News</a></p>
                                    <h5 class="mb-0"><a class="text-dark" href="#">We relocated our office to a new designed garage</a></h5>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="card border hover-shadow-6 mb-6 d-block">
                                <a href="#"><img class="card-img-top" src="../assets/img/thumb/2.jpg" alt="Card image cap"></a>
                                <div class="p-6 text-center">
                                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">Marketing</a></p>
                                    <h5 class="mb-0"><a class="text-dark" href="#">Top 5 brilliant content marketing strategies</a></h5>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="card border hover-shadow-6 mb-6 d-block">
                                <a href="#"><img class="card-img-top" src="../assets/img/thumb/3.jpg" alt="Card image cap"></a>
                                <div class="p-6 text-center">
                                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">Design</a></p>
                                    <h5 class="mb-0"><a class="text-dark" href="#">Best practices for minimalist design with example</a></h5>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="card border hover-shadow-6 mb-6 d-block">
                                <a href="#"><img class="card-img-top" src="../assets/img/thumb/4.jpg" alt="Card image cap"></a>
                                <div class="p-6 text-center">
                                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">Hiring</a></p>
                                    <h5 class="mb-0"><a class="text-dark" href="#">Congratulate and thank to Maryam for joining our team</a></h5>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="card border hover-shadow-6 mb-6 d-block">
                                <a href="#"><img class="card-img-top" src="../assets/img/thumb/5.jpg" alt="Card image cap"></a>
                                <div class="p-6 text-center">
                                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">Product</a></p>
                                    <h5 class="mb-0"><a class="text-dark" href="#">New published books to read by a product designer</a></h5>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="card border hover-shadow-6 mb-6 d-block">
                                <a href="#"><img class="card-img-top" src="../assets/img/thumb/6.jpg" alt="Card image cap"></a>
                                <div class="p-6 text-center">
                                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">Management</a></p>
                                    <h5 class="mb-0"><a class="text-dark" href="#">This is why it's time to ditch dress codes at work</a></h5>
                                </div>
                            </div>
                        </div>

                    </div>


                    <nav class="flexbox mt-30">
                        <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                        <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
                    </nav>
                </div>



                <div class="col-md-4 col-xl-3">
                    <div class="sidebar px-4 py-md-0">

                        <h6 class="sidebar-title">Search</h6>
                        <form class="input-group" target="#" method="GET">
                            <input type="text" class="form-control" name="s" placeholder="Search">
                            <div class="input-group-addon">
                                <span class="input-group-text"><i class="ti-search"></i></span>
                            </div>
                        </form>

                        <hr>

                        <h6 class="sidebar-title">Categories</h6>
                        <div class="row link-color-default fs-14 lh-24">
                            <div class="col-6"><a href="#">News</a></div>
                            <div class="col-6"><a href="#">Updates</a></div>
                            <div class="col-6"><a href="#">Design</a></div>
                            <div class="col-6"><a href="#">Marketing</a></div>
                            <div class="col-6"><a href="#">Partnership</a></div>
                            <div class="col-6"><a href="#">Product</a></div>
                            <div class="col-6"><a href="#">Hiring</a></div>
                            <div class="col-6"><a href="#">Offers</a></div>
                        </div>

                        <hr>

                        <h6 class="sidebar-title">Top posts</h6>
                        <a class="media text-default align-items-center mb-5" href="blog-single.html">
                            <img class="rounded w-65px mr-4" src="../assets/img/thumb/4.jpg">
                            <p class="media-body small-2 lh-4 mb-0">Thank to Maryam for joining our team</p>
                        </a>

                        <a class="media text-default align-items-center mb-5" href="blog-single.html">
                            <img class="rounded w-65px mr-4" src="../assets/img/thumb/3.jpg">
                            <p class="media-body small-2 lh-4 mb-0">Best practices for minimalist design</p>
                        </a>

                        <a class="media text-default align-items-center mb-5" href="blog-single.html">
                            <img class="rounded w-65px mr-4" src="../assets/img/thumb/5.jpg">
                            <p class="media-body small-2 lh-4 mb-0">New published books for product designers</p>
                        </a>

                        <a class="media text-default align-items-center mb-5" href="blog-single.html">
                            <img class="rounded w-65px mr-4" src="../assets/img/thumb/2.jpg">
                            <p class="media-body small-2 lh-4 mb-0">Top 5 brilliant content marketing strategies</p>
                        </a>

                        <hr>

                        <h6 class="sidebar-title">Tags</h6>
                        <div class="gap-multiline-items-1">
                            <a class="badge badge-secondary" href="#">Record</a>
                            <a class="badge badge-secondary" href="#">Progress</a>
                            <a class="badge badge-secondary" href="#">Customers</a>
                            <a class="badge badge-secondary" href="#">Freebie</a>
                            <a class="badge badge-secondary" href="#">Offer</a>
                            <a class="badge badge-secondary" href="#">Screenshot</a>
                            <a class="badge badge-secondary" href="#">Milestone</a>
                            <a class="badge badge-secondary" href="#">Version</a>
                            <a class="badge badge-secondary" href="#">Design</a>
                            <a class="badge badge-secondary" href="#">Customers</a>
                            <a class="badge badge-secondary" href="#">Job</a>
                        </div>

                        <hr>

                        <h6 class="sidebar-title">About</h6>
                        <p class="small-3">TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.</p>


                    </div>
                </div>

            </div>
        </div>
    </div>
</main>


<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">

            <div class="col-6 col-lg-3">
                <a href="../index.html"><img src="../assets/img/logo-dark.png" alt="logo"></a>
            </div>

            <div class="col-6 col-lg-3 text-right order-lg-last">
                <div class="social">
                    <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
                    <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
                    <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
                    <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
                    <a class="nav-link" href="../uikit/index.html">Elements</a>
                    <a class="nav-link" href="../block/index.html">Blocks</a>
                    <a class="nav-link" href="../page/about-1.html">About</a>
                    <a class="nav-link" href="../blog/grid.html">Blog</a>
                    <a class="nav-link" href="../page/contact-1.html">Contact</a>
                </div>
            </div>

        </div>
    </div>
</footer><!-- /.footer -->


<!-- Scripts -->
<script src="{{asset('js/client/page.min.js')}}"></script>
<script src="{{asset('js/client/script.js')}}"></script>
</body>
</html>
