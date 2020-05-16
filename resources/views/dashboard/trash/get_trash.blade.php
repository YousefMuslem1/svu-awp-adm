@extends('layouts.dashboard.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{route('dashboard.category.trash')}}">الأقسام المحذوفة</a>
                    <span class="badge badge-primary badge-pill">{{$categoriesTrashedCount}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{route('dashboard.article.trash')}}">المقالات المحذوفة</a>
                    <span class="badge badge-primary badge-pill">{{$articlesTrashedCount}}</span>
                </li>
            </ul>
        </div>
    </div>

@endsection
