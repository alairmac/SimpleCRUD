async function updateTable(url, value, token) {
    const rows = await fetchTableData(url, value, token);
    const tbody = document.querySelector('tbody');

    const projectRow = createRow([
        rows.projectCode,
        rows.ProjectNames,
        createButton('btn btn-outline-primary', '#addTask', { 'id': rows.projectCode }, "Add"),
        createButton('btn btn-outline-success', '#editProject', { 'id': rows.projectCode, 'name': rows.ProjectNames }, "Edit"),
        createButton('btn btn-outline-danger', '#deleteModal', { 'id': rows.projectCode, 'name': rows.ProjectNames, 'type': 'project' }, "Delete")
    ]);
    tbody.appendChild(projectRow);

    rows.TaskIds.forEach((taskId, index) => {
        const taskRow = createRow([
            '',
            `${rows.TaskNames[index]} - ${rows.TaskHrs[index]} hours`,
            '',
            createButton('btn btn-outline-success', '#editTask', { 'id': taskId, 'name': rows.TaskNames[index], 'hr': rows.TaskHrs[index] }, "Edit"),
            createButton('btn btn-outline-danger', '#deleteModal', { 'id': taskId, 'name': rows.TaskNames[index], 'type': 'task' }, "Delete")
        ]);
        tbody.appendChild(taskRow);
    });
}