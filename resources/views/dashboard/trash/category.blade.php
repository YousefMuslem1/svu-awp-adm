@extends('layouts.dashboard.app')

@section('content')
    <div class="row ml-3">
        @foreach($categories as $category)
        <div class="col-md-4 mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$category->name}}
                    </h5>
                    <p class="card-text">
                        يحوي القسم على  محذوفة<span class="badge badge-success float-left">{{$category->articles()->withTrashed()->count()}}</span>
                    </p>

                    <form action="{{route('dashboard.categories.restore', $category->id)}}" method="POST">
                        @csrf
                        <button
                            type="button"
                            class="btn btn-danger"
                            data-toggle="modal"
                            data-name="{{$category->name}}"
                            data-target="#deleteCategory"
                            onclick=handleDelete({{$category->id}})
                        >حذف نهائي</button>
                        <button type="submit" class="btn btn-success" data-dismiss="modal">استعادة</button>
                    </form>
                </div>
            </div>
        </div>
            @endforeach

    </div>
    @if(count($categories) == 0)
        <div class="alert alert-info lead">لاتوجد أقسام محذوفة </div>
    @endif
@endsection
@section('scripts')
<script>
    //Delete a category
    $('.modal').on('hidden.bs.modal', function (e) {
        $(this).find("#d-head").html('').end()
    })
    // Reset inputs in modal after hiden from user
    $('#deleteCategory').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var name = button.data('name');
        var modal = $(this)
        modal.find('.modal-body #d-head').append(name + ' ') ;

    })

    function handleDelete(id) {
    console.log(id)
        var form = document.getElementById('deleteFormCategory');
        form.action = '/dashboard/categories/' + id;
    }
</script>
@endsection
@include('dashboard.partials.delete_category_modal')
