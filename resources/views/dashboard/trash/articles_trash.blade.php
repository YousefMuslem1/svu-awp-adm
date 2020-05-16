@extends('layouts.dashboard.app')

@include('dashboard.partials.articles.delete_article_modal')
@section('content')
    <div class="row ml-3">
        @foreach($articles as $article)
            <div class="col-md-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title" title="{{$article->description}}">{{$article->title}} </h5>

                        <form action="{{route('dashboard.articles.restore', $article->id)}}" method="POST">
                            @csrf
                            <button
                                type="button"
                                class="btn btn-danger"
                                data-toggle="modal"
                                data-title="{{$article->title}}"
                                data-target="#deleteArticle"
                                onclick=handleDelete({{$article->id}})
                            >حذف نهائي</button>
                            <button type="submit" class="btn btn-success">استعادة</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    @if(count($articles) == 0)
        <div class="alert alert-info lead">لاتوجد مقالات محذوفة </div>
    @endif
@endsection
@section('scripts')
    <script>
        //Delete a category
        $('.modal').on('hidden.bs.modal', function (e) {
            $(this).find("#d-head").html('').end()
        })
        // Reset inputs in modal after hiden from user
        $('#deleteArticle').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget)
            var name = button.data('title');
            var modal = $(this)
            modal.find('.modal-body #d-head').append(name + ' ') ;

        })

        function handleDelete(id) {
            console.log(id)
            var form = document.getElementById('deleteFormArticle');
            form.action = `/dashboard/articles/${id}`;
        }
    </script>
@endsection
