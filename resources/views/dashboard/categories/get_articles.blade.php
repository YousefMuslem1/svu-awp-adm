@extends('layouts.dashboard.app')


@section('content')
    @foreach($articles as $article)

        <div>
            <a href="{{route('dashboard.articles.show', $article->id)}}">{{$article->title}}</a>
            <p class="description">{{$article->description}}</p>
        </div>
        <hr>
    @endforeach

@endsection
@section('scripts')
    <script>
        $('.description').limitText({
            length: 90,
            ellipsisText: '...'
        }).css('color', '#868E96');

    </script>
@endsection

