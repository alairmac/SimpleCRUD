function createRow(cellsData) {
    const newRow = document.createElement('tr');
    cellsData.forEach(cellData => {
        const newCell = document.createElement('td');
        if (cellData instanceof HTMLElement) {
            newCell.appendChild(cellData);
        } else {
            newCell.textContent = cellData;
        }
        newRow.appendChild(newCell);
    });
    return newRow;
}