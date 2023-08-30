function loadContent(content) {
    if (content === 'anadirProducto') {
        document.getElementById('anadirTitulo').style.display = 'block';
        document.getElementById('formularioAnadir').style.display = 'block';
    } else {
        document.getElementById('anadirTitulo').style.display = 'none';
        document.getElementById('formularioAnadir').style.display = 'none';
    }
    // Resto del código para cargar otros contenidos si es necesario
}
