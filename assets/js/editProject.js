const editPrjModal = document.getElementById('editProject');
if (editPrjModal) {
    editPrjModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const id = button.getAttribute('data-id');
        const projectName = button.getAttribute('data-name');
        $('#editprojectCode').val(id);
        $('#editprojectName').val(projectName);
    })
}