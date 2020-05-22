@extends('layouts.app')
{{--@include('partials.sidebar')--}}
@section('content')

        <div class="section bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xl-9">
                        <div class="row gap-y">
                                @forelse($articles as $article)
                                <div class="col-md-6">
                                    <div class="card border hover-shadow-6 mb-6 d-block">
                                        <a href="{{route('show.article', $article->id)}}"><img class="card-img-top" src="{{asset('images/'.$article->image)}}" alt="Card image cap"></a>
                                        <div class="p-6 text-center">
                                            <p>
                                                <a class=" ls-2 fw-400" href="{{route('show.categories.articles',$article->category->id)}}">
                                                    {{$article->category->name}}</a>
                                            </p>
                                            <h5 class="mb-0"><a class="text-dark" href="{{route('show.article', $article->id)}}">{{$article->title}}</a></h5>
                                        </div>
                                        <div class="card-footer text-center">
                                            <i class="fa fa-eye"></i> {{ $article->view_count }}
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <strong> {{ request()->query('s')}} </strong>
                                       لم يتم العثور على نتائج مرتبطة
                                @endforelse
                        </div>

                        {{$articles->appends(['s' => request()->query('s')])->links()}}
                    </div>


                    <div class="col-md-4 col-xl-3">
                        <div class="sidebar px-4 py-md-0">

                            <h6 class="sidebar-title ml-auto">بحث</h6>
                            <form class="input-group" action="{{route('home')}}" method="get">
                                <input type="text" class="form-control" name="s" placeholder="Search" value="{{request()->query('s')}}">
                                <div class="input-group-addon">
                                    <span class="input-group-text"><i class="ti-search"></i></span>
                                </div>
                            </form>

                            <hr>

                            <h4 class="sidebar-title ml-auto">الأقسام</h4>
                            <div class="row link-color-default fs-14 lh-24">
                                @foreach($categories as $category)
                                <div class="col-6"><a href="{{route('show.categories.articles', $category->id)}}">{{ $category->name }}</a></div>
                                @endforeach
                            </div>

                            <hr>

                            <h6 class="sidebar-title ml-auto">الأكثر مشاهدة</h6>
                            @for($i = 0; $i < 5; $i++)
                                <a class="media text-default align-items-center mb-5" href="{{route('show.article', $topArticles[$i]->id)}}">
                                    <img class="rounded w-65px mr-4" src="{{asset('storage/'.$topArticles[$i]->image)}}">
                                    <p class="media-body small-2 lh-4 mb-0">{{$topArticles[$i]->title}}</p>
                                </a>
                            @endfor


                            <hr>

{{--                            <h6 class="sidebar-title ml-auto">من نحن</h6>--}}
{{--                            <p class="small-3 ml-auto text-center" style="direction: rtl">--}}
{{--                                <br><span class="text-warning">مشروع تنفيذ موقع يقدم مقالات واستشارات طبية</span>--}}
{{--                                <span class="lead-2">قام بتنفيذ المشروع كل من :</span><br>--}}
{{--                                1. يوسف حسين مسلم<br>--}}
{{--                                2. أيمن رحيم <br>--}}
{{--                                3. مصطفى جمعة--}}
{{--                            </p>--}}

                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection
