@extends('layouts.dashboard.app')

@section('content')
    <h2 class="text-secondary">إدارة الأقسام</h2>
    <hr>
    <button
        class="btn btn-success mb-2 lead"
        data-toggle="modal"
        data-target="#addCategory"
        style="cursor: pointer">
        <i class="fas fa-plus mr-2"></i>
        إضافة قسم</button>
        @include('dashboard.partials.add_category_modal')
        @include('dashboard.partials.edit_category_modal')
        @include('dashboard.partials.delete_category_modal')
    <div class="card card-default">
        <div class="card-header">
            الأقسام الرئيسية
        </div>
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                <th>اسم القسم</th>
                <th>عدد المواضيع</th>
                <th>تاريخ الإنشاء</th>
                <th>حذف</th>
                <th>تعديل</th>
                </thead>
                <tbody class="lead categories">

                @foreach($categories as $category)
                    <tr>
                        <td class="name"><a href="{{route('dashboard.categories.articles', $category->id)}}">{{ $category->name }}</a></td>
                        <td>
                            <a href="{{route('dashboard.categories.articles', $category->id)}}">
                                <span class="badge badge-warning">{{ $category->articles->count() }}</span>
                            </a>
                        </td>
                        <td style="font-size: .8rem">
                            {{date('F d, Y', strtotime($category->created_at))}} at {{date('g:ia')}}
                        </td>
                        <td>
                            <button
                                class="btn btn-danger btn-sm"
                                onclick="handleDelete({{$category->id}})"
                                data-toggle="modal"
                                data-target="#deleteCategory"
                                data-name='{{$category->name}}'
                                    style="cursor: pointer"
                                    >حذف</button>
                        </td>
                        <td><button
                                    class="btn btn-info btn-sm"
                                    data-toggle="modal"
                                    data-target="#editCategory"
                                    data-name='{{ $category->name }}'
                                        data-id = '{{ $category->id }}'
                                    style="cursor: pointer"
                                     >تعديل</button>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!!  $categories->links()  !!}
        @if(count($categories) == 0)
                <div class="alert alert-info">لم تتم إضافة أقسام بعد
                    <button
                        class="btn btn-link"
                        data-toggle="modal"
                        data-target="#addCategory"
                        style="cursor: pointer"
                    >أنشئ الآن</button>
                </div>
            @endif
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        // Reset inputs in modal after hiden from user
        $('.modal').on('hidden.bs.modal', function (e) {
            $(this).find("input").val('').end()
        })
        // send Ajax Request To Store a category
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#addNewCategory").submit(function(e){
            e.preventDefault();
            var data = $('#addNewCategory').serialize();
            console.log(data);
            var url = '{{ route('dashboard.categories.store') }}';
            $.ajax({
                url:url,
                method:'POST',
                data: data,
                success:function(response){
                    if(response.success){
                        $('.modal').modal('hide');

                        alert(response.message) ;//Message come from controller
                        location.reload();
                    }else{
                        alert(response.message)
                    }
                },

            });
        });

        // Send Ajax request for edit a category
        $('#editCategory').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget)
            var name = button.data('name');
            var id = button.data('id');

            var modal = $(this)
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #id').val(id);
        })
        // send Ajax Request To Store Data
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#editCategory").submit(function(e){
            e.preventDefault();
            var data = $('#editFormCategory').serialize();
            console.log(data)
            var url = '{{ url('/') }}/dashboard/categories/up'
            $.ajax({
                url:url,
                method:'PUT',
                data: data,
                success:function(response){
                    if(response.success){
                        $('.modal').modal('hide');

                        alert(response.message) ;//Message come from controller
                        location.reload();
                    }else{
                        alert(response.message)
                    }
                },

            });
        });


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

            var form = document.getElementById('deleteFormCategory');
            form.action = `/dashboard/categories/${id}`
        }

        $('.name').limitText({
            length: 35,
            ellipsisText: '...'
        }).css('color', '#800000');

    </script>
@endsection

