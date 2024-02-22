const deleteModal = document.getElementById('deleteModal');
if (deleteModal) {
    deleteModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const id = button.getAttribute('data-id');
        const type = button.getAttribute('data-type');
        const name = button.getAttribute('data-name');
        $('#deleteId').val(id);
        $('#type').val(type);
        if (type == "porject") {
            $('#deleteName').html(`"${name}" Project`);
        } else {
            $('#deleteName').html(`"${name}" Task`);
        }
    })
}