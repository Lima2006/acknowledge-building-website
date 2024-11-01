function aumentarFonte() {
    const elements = document.querySelectorAll('body, .container, .sidebar, .calendar');
    
    elements.forEach(element => {
        const currentFontSize = window.getComputedStyle(element).fontSize;
        const newFontSize = parseFloat(currentFontSize) + 2 + "px";
        element.style.fontSize = newFontSize;
    });
}