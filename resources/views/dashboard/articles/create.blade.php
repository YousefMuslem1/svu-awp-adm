@extends('layouts.dashboard.app')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/trix.css')}}">
@endsection
@section('content')
    <h2 class="text-secondary">إضافة مقالة جديدة</h2>
    <hr>
    <div class="card card-default">
        <div class="card-header">
            إنشاء مقالة جديدة
        </div>
        <div class="card-body">
            <form action="{{route('dashboard.articles.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">عنوان المقالة</label>
                    <input type="text" id="title" class="form-control" name="title" placeholder="مثال : صحة قلبك" value="{{old('title')}}" required>
                </div>
                @error('title') <div class="alert alert-danger">{{$message}}</div> @enderror
                <div class="form-group">
                    <label for="description">محتوى المقالة</label>
                    <input id="description" type="hidden" name="description" value="{{old('description')}}">
                    <trix-editor input="description" placeholder="يمكن تنسيق المقالة من خلال الخيارت في الأعلى" ></trix-editor>
                </div>
                @error('description') <div class="alert alert-danger">{{$message}}</div> @enderror
                <div class="form-group">
                    <label for="description">القسم</label>
                    <select class="form-control" id="category" name="category_id" required>
                        <option value="">قم بتحديد قسم المقالة...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('category') <div class="alert alert-danger">{{$message}}</div> @enderror
                <div class="form-group">
                    <label for="image">غلاف المقالة</label>
                    <input type="file" class="form-control-file" id="image" name="image" required>
                </div>
                @error('image') <div class="alert alert-danger">{{$message}}</div> @enderror
                <button type="submit" class="btn btn-success mt-3">حفظ المقالة</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/trix.min.js')}}"> </script>
@endsection
