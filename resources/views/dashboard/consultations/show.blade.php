@extends('layouts.dashboard.app')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/trix.css')}}">
@endsection
@section('content')

    <div class="row justify-content-center">

        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header">
                    نظام الاستشارة  الطلبات الواردة
                </div>
                <div class="card-body">
                        <h6 class="lead">
                            <span class="text-danger">عنوان الاستشارة : </span>
                            <p class=" d-inline">{{$consultation->consult_add}}</p>
                            @if($consultation->is_replayed)
                                <span class="badge badge-success">تم الرد</span>
                            @else
                                <span class="badge badge-danger">لم يتم الرد</span>
                            @endif
                        </h6>
                    <br>
                    <h6 class="lead">
                        <span class=" text-danger">تاريخ الاستشارة : </span>
                        <p class=" d-inline ">
                            {{date('F d, Y', strtotime($consultation->created_at))}} at {{date('g:ia')}}
                        </p>
                    </h6>
                    <br>     <h6 class="lead">
                        <span class=" text-danger">المرسل : </span>
                        <p class=" d-inline ">{{$consultation->user->name}}</p>
                    </h6>
                    <br>
                    <h6 class="lead">
                        <span class=" text-danger">العمر : </span>
                        <p class=" d-inline ">{{$consultation->age}}</p>
                    </h6>
                    <br>
                    <h6 class="lead">
                        <span class=" text-danger">الجنس : </span>
                        <p class=" d-inline ">{{$consultation->gender}}</p>
                    </h6>
                    <br>
                    <h6 class="lead">
                        <span class=" text-danger">التاريخ المرضي : </span>
                        <p class=" d-inline ">{!! $consultation->dis_history !!}</p>
                    </h6>
                    <br>
                    <h6 class="lead">
                        <span class=" text-danger">نص الاستشارة : </span> <br>
                        <p class=" d-inline p-3 ml-5">{!! $consultation->consult_body !!}</p>
                    </h6>

                    <form action="{{route('dashboard.consultation.replay', $consultation->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="replay" class="lead text-danger">نص الرد: </label>
                            @if(!$consultation->is_replayed)
                                <input id="replay" type="hidden" name="replay">
                                <trix-editor input="replay" placeholder="يمكن تنسيق الرد من خلال الخيارت في الأعلى" ></trix-editor>
                            @else
                                <p>{!! $consultation->admin_replay !!}</p>
                            @endif
                        </div>
                        @if(!$consultation->is_replayed)
                        <input type="submit" class="btn btn-success" value="إرسال رد">
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/trix.min.js')}}"> </script>
@endsection
