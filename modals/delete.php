<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./includes/delete.inc.php" method="POST">
                <input type="hidden" id="deleteId" name="deleteId" value="">
                <input type="hidden" id="type" name="type" value="">
                <div class="modal-body">
                    <p class="text-center">Are you sure you want to delete <span class="fw-bold" id="deleteName"></span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delete" class="btn btn-danger">Yes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </div>
            </form>
        </div>
    </div>
</div>