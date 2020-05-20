@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container">

            <div class="text-center mt-8">
                <h2>{{ $article->title }}</h2>
                <p> in {{date('F d, Y', strtotime($article->created_at))}} at {{date('g:ia')}}</p>
            </div>


            <div class="text-center my-8">
                <img class="rounded-md" src="{{secure_asset('storage/' . $article->image)}}" alt="...">
            </div>


            <div class="row">
                <div class="col-lg-8 mx-auto">


                    <hr class="w-100px">

                    <div class="article lead-2">
                        {!! $article->description !!}
                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection

