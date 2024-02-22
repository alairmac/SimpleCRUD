<div class="modal fade" id="editTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editTaskLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editTaskLabel">Edit Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./includes/editTask.inc.php" method="POST">
                <input type="hidden" id="ediTtaskId" name="taskId" value="">
                <div class="modal-body">
                    <label class="form-label">Task Name</label>
                    <div class="input-group mb-3">
                        <input type="text" id="edittaskName" name="taskName" class="form-control" placeholder="Task Name" required>
                        <input type="number" id="edittaskHr" name="taskHr" class="form-control" placeholder="Task Hours" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="edit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>