<div class="modal fade" id="addTask" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addTaskLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addTaskLabel">Add Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./includes/addTask.inc.php" method="POST">
                <input type="hidden" id="projectCode" name="projectCode" value="">
                <div class="modal-body">
                    <label class="form-label">Task Name</label>
                    <button class="btn btn-sm text-white font-weight-bold bg-success m-3" type="button" id="addTaskButton">Add</button>
                    <div class="input-group mb-3">
                        <input type="text" name="taskName[]" class="form-control" placeholder="Task Name" required>
                        <input type="number" name="taskHr[]" class="form-control" placeholder="Task Hours" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="create" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>