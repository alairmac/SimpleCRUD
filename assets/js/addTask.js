const addTaskModal = document.getElementById('addTask');
if (addTaskModal) {
    addTaskModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const id = button.getAttribute('data-id');
        $('#projectCode').val(id);
    })
}
$("#addTaskButton").click(function () {
    $('#addTask .modal-body').append(`
    <div class="input-group mb-3">
        <input type="text" name="taskName[]" class="form-control" placeholder="Task Name" required>
        <input type="number" name="taskHr[]" class="form-control" placeholder="Task Hours" required>
        <button class="btn text-white font-weight-bold bg-danger btn_remove" type="button">-</button>
    </div>`);
});