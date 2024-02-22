const editTskModal = document.getElementById('editTask');
if (editTskModal) {
    editTskModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const id = button.getAttribute('data-id');
        const taskName = button.getAttribute('data-name');
        const taskHr = button.getAttribute('data-hr');
        $('#ediTtaskId').val(id);
        $('#edittaskName').val(taskName);
        $('#edittaskHr').val(taskHr);
    })
}