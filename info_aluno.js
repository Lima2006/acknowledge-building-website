function aumentarFonte() {
    const body = document.body;
    let currentFontSize = parseFloat(window.getComputedStyle(body).fontSize);
    body.style.fontSize = (currentFontSize + 2) + 'px';
}
