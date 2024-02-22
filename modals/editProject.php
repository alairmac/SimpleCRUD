<div class="modal fade" id="editProject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProjectLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editProjectLabel">Edit Project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./includes/editProject.inc.php" method="POST">
                <input type="hidden" id="editprojectCode" name="projectCode" value="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="projectName" class="form-label">Project Name</label>
                        <input type="text" class="form-control" name="projectName" id="editprojectName" placeholder="Project Name" value="" required>
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