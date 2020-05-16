@extends('layouts.dashboard.app')

@section('content')

<div class="container">
    <h3 class="text-secondary">إحصائات الموقع</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header ">عدد الأقسام الكلية</div>
                    <div class="card-body text-center">
                        <h5 class="card-title" style="font-size: 3.8rem">
                            <a class="text-white" href="{{route('dashboard.categories.index')}}">{{count($categories)}}</a>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">الإســتــشــارات</div>
                <div class="card-body text-center">
                    <h5 class="card-title text-danger" style="font-size: 1.9rem">
                        <span class="text-white"> تم الرد على: </span>
                        {{count($consult_rep)}}
                        <hr>
                        <span class="text-white"> لم يتم الرد على: </span>
                        <a class="text-danger" href="{{route('dashboard.consultations.index')}}">{{count($consult_not_rep)}}</a>
                    </h5>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header ">عدد المقالات الكلية</div>
                    <div class="card-body text-center">
                        <h5 class="card-title" style="font-size: 3.8rem">
                            <a class="text-white" href="{{route('dashboard.articles.index')}}"> {{count($articles)}} </a>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header ">سلة المحذوفات </div>
                    <div class="card-body text-center">
                        <h5 class="card-title" style="font-size: 3.8rem">
                            <a class="text-white" href="{{route('dashboard.trash')}}"> {{$totalTrash}} </a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
