<div class="modal fade" id="createProject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createProjectLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createProjectLabel">Create Project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./includes/createProject.inc.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="projectName" class="form-label">Project Name</label>
                        <input type="text" class="form-control" name="projectName" id="projectName" placeholder="Project Name" required>
                    </div>
                    <label for="taskName" class="form-label">Task Name</label>
                    <button class="btn btn-sm text-white font-weight-bold bg-success m-3" type="button" id="add">Add</button>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="create" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>