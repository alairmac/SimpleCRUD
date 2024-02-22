function createRow(cellsData) {
    const newRow = document.createElement('tr');
    cellsData.forEach(cellData => {
        const newCell = document.createElement('td');
        if (cellData instanceof HTMLElement) { // Check if cellData is a DOM element
            newCell.appendChild(cellData); // Append the button element to the cell
        } else {
            newCell.textContent = cellData; // Set the text content of the cell
        }
        newRow.appendChild(newCell);
    });
    return newRow;
}