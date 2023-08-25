document.addEventListener("DOMContentLoaded", function() {
    var enlacesModificar = document.querySelectorAll(".enlaceModificar");

    enlacesModificar.forEach(function(enlace) {
        enlace.addEventListener("click", function(event) {
            event.preventDefault(); // Evita que el enlace recargue la página
            var idProducto = this.getAttribute("data-id");
            mostrarFormularioModificar(idProducto);
        });
    });

    function mostrarFormularioModificar(idProducto) {
        var formulariosModificar = document.querySelectorAll(".formularioModificar");
        formulariosModificar.forEach(function(formulario) {
            formulario.style.display = "none";
        });

        var formularioMostrar = document.getElementById("formularioModificar_" + idProducto);
        formularioMostrar.style.display = "block";
    }
});
