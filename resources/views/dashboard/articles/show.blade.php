@extends('layouts.dashboard.app')

@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-secondary "><i class="fas fa-undo-alt"></i>  رجــوع</a>
    <div class="row ml-3 mt-4">
        <div class="col-md-10">
            <h2>
                {{$article->title}}
                <a href="{{route('dashboard.articles.edit', $article->id)}}" class="btn btn-success btn-sm float-left"><i class="fas fa-edit"></i> تعديل</a>
            </h2>
            <span class="text-secondary" style="font-size: .7rem"><i class="fas fa-history"></i>
            {{date('F d, Y', strtotime($article->created_at))}} at {{date('g:ia')}}
            </span><br>
            القسم :<span class="text-secondary">  {{$article->category->name}} </span>
            <img src="{{asset('/images/'.$article->image)}}" alt="{{$article->name}}" class="img-thumbnail my-4">
            <p>{!! $article->description !!}</p>
        </div>
    </div>
@endsection
