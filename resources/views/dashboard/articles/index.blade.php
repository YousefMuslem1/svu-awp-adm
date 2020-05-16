@extends('layouts.dashboard.app')

@section('content')
    <h2 class="text-secondary">إدارة المقالات</h2>
    <hr>
    <a href="{{route('dashboard.articles.create')}}" class="btn btn-success mb-3"> <i class="fas fa-plus mr-2"></i>أضف مقالة </a>

    <div class="card card-default">
        <div class="card-header">
            المقالات
        </div>
        <div class="card-body">

            <table class="table table-hover">
                <thead style="font-size: .8rem">
                <th>عنوان المقالة</th>
                <th>الوصف</th>
                <th>عدد الزوار</th>
                <th>تاريخ الإنشاء</th>
                <th>تاريخ آخر تعديل</th>
                <th>القسم الحاوي</th>
                <th>الغلاف</th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody class="lead categories" style="font-size: 1.1rem">

                @foreach($articles as $article)
                    <tr>
                        <td >
                            <a class="title"
                               href="{{route('dashboard.articles.show', $article->id)}}" target="_blank" title="{{ $article->title }}">{{ $article->title }}</a>
                        </td>
                        <td class="description" title="{{ $article->description }} ">{!! $article->description !!} </td>
                        <td>
                            <span class="badge badge-warning">{{$article->view_count}}</span>
                        </td>
                        <td style="font-size: .8rem">
                            {{date('F d, Y', strtotime($article->created_at))}} at {{date('g:ia')}}
                        </td>
                        <td style="font-size: .8rem">
                            {{date('F d, Y', strtotime($article->updated_at))}} at {{date('g:ia')}}
                        </td>
                        <td class="category">{{ $article->category->name }}</td>
                        <td>
                            <img src="{{asset('/storage/'.$article->image)}}" alt="{{$article->name}}" width="90px" height="70px">
                        </td>
                        <td>
                            <button
                                class="btn btn-danger btn-sm m-0"
                                data-title="{{$article->title}}"
                                data-toggle="modal"
                                data-target="#deleteArticle"
                                onclick="handleDelete({{$article->id}})"
                                title="حذف"
                                style="cursor: pointer"><i class="fas fa-trash-alt"></i></button>
                        </td>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="{{route('dashboard.articles.show', $article->id)}}" target="_blank" title="مشاهدة ">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('dashboard.articles.edit', $article->id)}}"
                               class="btn btn-info btn-sm m-0"
                               style="cursor: pointer"
                               title="تعديل"
                            ><i class="fas fa-edit"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!!  $articles->links()  !!}
            @if(count($articles) == 0)
                <div class="alert alert-info lead">لم تتم إضافة أي مقالة بعد
                    <a href="{{route('dashboard.articles.create')}}">أنشئ الآن</a>
                </div>
            @endif
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('.description').limitText({
            length: 18,
            ellipsisText: '...'
        }).css('color', '#800000');
        $('.title').limitText({
            length: 12,
            ellipsisText: '...'
        }).css('color', '#800000');
        $('.category').limitText({
            length: 20,
            ellipsisText: '...'
        }).css('color', '#800000');

        //Delete a category
        $('.modal').on('hidden.bs.modal', function (e) {
            $(this).find("#d-head").html('').end()
        })
        // Reset inputs in modal after hiden from user
        $('#deleteArticle').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget)
            var title = button.data('title');
            var modal = $(this)
            modal.find('.modal-body #d-head').append(title + ' ') ;

        })
        function handleDelete(id) {

            var form = document.getElementById('deleteFormArticle');
            form.action = '/dashboard/articles/' + id;
        }
    </script>
@endsection

@include('dashboard.partials.articles.delete_article_modal')
