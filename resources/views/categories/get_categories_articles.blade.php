@extends('layouts.app')


@section('content')
    <section class="section bg-gray p-0" >
        <div class="container">
            <h2 class="lead-4 text-center text-warning" style="direction: rtl">مقالات عن {{ $articles[0]->category->name }}</h2>
            <div class="row">

                <div class="col-md-10 col-xl-9 mx-auto">
                    @foreach($articles as $article)
                        <div class="card hover-shadow-7 my-8">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="blog-single.html">
                                    <img class="fit-cover position-absolute h-100" src="{{asset($article->image)}}" alt="...">
                                </a>
                            </div>

                            <div class="col-md-8">
                                <div class="p-7" style="direction: rtl">
                                    <h4>{{$article->title}}</h4>
                                    <p class="description">{!! $article->description !!}</p>
                                    <a class="small ls-1" href="{{route('show.article', $article->id)}}"> <span class="pl-1">&xrarr;</span>المزيد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    {{ $articles->links() }}

                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('js/limit.text.min.js')}}"></script>
    <script>
        $('.description').limitText({
            length: 100,
            ellipsisText: '...'
        });
    </script>
@endsection
