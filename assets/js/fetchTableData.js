function fetchTableData(url, value, token) {
    return fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            key: value,
            token: token
        }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        return data;
    })
    .catch(error => {
        console.error('Error:', error);
        throw error; // Re-throw the error to propagate it to the caller
    });
}
