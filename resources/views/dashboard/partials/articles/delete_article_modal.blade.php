<!-- Modal -->
<div class="modal fade" id="deleteArticle" tabindex="-1" role="dialog" aria-labelledby="deleteArticle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">حذف مقالة </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="lead" > هل أنت متأكد من حذف المقالة: <br> <span id="d-head" style="font-weight: bolder"> </span></p>
                <form action="" method="post" id="deleteFormArticle">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">تراجع</button>
                    <button type="submit" name="delete" id="delete" class="btn btn-primary ml-4">تأكيد</button>
                </form>
            </div>
        </div>
    </div>
</div>
