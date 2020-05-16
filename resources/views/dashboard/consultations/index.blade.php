@extends('layouts.dashboard.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <ul class="list-group">
                @foreach($consultations as $consultation)
                    <li class="list-group-item lead mb-2">
                        <h6 class="m-0 p-0"><a href="#" class="m-0 p-0">{{$consultation->consult_add}}</a></h6>
                        <span class="m-0 p-0" style="font-size: .7rem">
                            <i class="fas fa-history"></i>
                            {{date('F d, Y', strtotime($consultation->created_at))}} at {{date('g:ia')}}
                        </span><br>
                        <p><span class="text-info"> المرسل : </span> {{$consultation->user->name}}</p>
                        <h6>
                            <span class="text-secondary">الحالة : </span>
                            <span class="text-danger">
                                @if(!$consultation->is_replayed)  لم يتم الرد بعد
                                    @else  <span class="text-success"> تم الرد</span>
                                @endif</span>
                        </h6>
                        @if(!$consultation->is_replayed)
                            <a href="{{route('dashboard.consultations.show', $consultation->id)}}" class="btn btn-success float-left"> قراءة ورد <i class="fas fa-comment-dots"></i></a>
                        @else
                            <a href="{{route('dashboard.consultations.show', $consultation->id)}}" class="btn btn-secondary float-left"> مشاهدة <i class="fas fa-eye"></i></a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
