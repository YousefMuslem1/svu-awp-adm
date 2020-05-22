@extends('layouts.dashboard.app')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/trix.css')}}">
@endsection
@section('content')
    <h2 class="text-secondary">تعديل مقالة سابقة</h2>
    <hr>
    <div class="card card-default">
        <div class="card-header">
            تعديل مقالة
        </div>
        <div class="card-body">
            <form action="{{route('dashboard.articles.update', $article->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">عنوان المقالة</label>
                    <input type="text" id="title" class="form-control" name="title" placeholder="مثال : صحة قلبك" value="{{$article->title}}" required>
                </div>
                @error('title') <div class="alert alert-danger">{{$message}}</div> @enderror
                <div class="form-group">
                    <label for="description">محتوى المقالة</label>
                    <input id="description" type="hidden" name="description" value="{{$article->description}}">
                    <trix-editor input="description" placeholder="يمكن تنسيق المقالة من خلال الخيارت في الأعلى" ></trix-editor>
                </div>
                @error('description') <div class="alert alert-danger">{{$message}}</div> @enderror
                <div class="form-group">
                    <label for="description">القسم</label>
                    <select class="form-control" id="category" name="category_id" required>
                        <option value="">قم بتحديد قسم المقالة...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($article->category_id == $category->id) selected @endif>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('category') <div class="alert alert-danger">{{$message}}</div> @enderror
                <div class="form-group">
                    <label for="image">غلاف المقالة</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                @error('image') <div class="alert alert-danger">{{$message}}</div> @enderror
                <img src="{{asset('/images/'.$article->image)}}" alt="{{$article->name}}" width="100%" height="400px">
                <hr>
                <button type="submit" class="btn btn-success mt-3" style="cursor: pointer">تعديل المقالة</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/trix.min.js')}}"> </script>
@endsection
