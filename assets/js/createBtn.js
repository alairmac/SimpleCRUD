function createButton(cssclass, activity, dataid, content) {
    const button = document.createElement('button');
    button.setAttribute('type', 'button');
    button.setAttribute('class', cssclass);
    button.setAttribute('data-bs-toggle', 'modal');
    button.setAttribute('data-bs-target', activity);

    for (const key in dataid) {
        button.setAttribute(`data-${key}`, dataid[key]);
    }
    button.textContent = content;
    return button;
}