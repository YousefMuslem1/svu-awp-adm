<!-- Modal -->
<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="editCategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"  >تعديل قسم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editFormCategory">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name">إسم القسم</label>
                        <input type="text" class="form-control cat-name" name="name" id="name">
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">تراجع</button>
                    <button type="submit" name="edit" id="edit" class="btn btn-primary ml-4">تعديل</button>
                </form>
            </div>
        </div>
    </div>
</div>
