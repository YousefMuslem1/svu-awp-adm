<!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategory">إضافة قسم جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="addNewCategory">
                    @csrf
                    <div class="form-group">
                        <label for="name">إسم القسم</label>
                        <input type="text" class="form-control cat-name" name="name" id="name">
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">تراجع</button>
                    <button type="submit" name="store" id="store" class="btn btn-primary ml-4">حفظ</button>
                </form>
            </div>
        </div>
    </div>
</div>
