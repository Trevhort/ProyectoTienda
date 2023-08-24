document.addEventListener("DOMContentLoaded", function() {
    var botonEnviar = document.querySelector("button[type='submit']");
    botonEnviar.addEventListener("click", function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe

        var email = document.getElementById("email").value;
        var pass = document.getElementById("pass").value;

        // Enviar los datos del formulario al servidor
        fetch("/tienda/inicioSesion.php", {
            method: "POST",
            body: JSON.stringify({ user_email: email, user_pass: pass }),
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(response => response.json())
        .then(data => {
            // Limpiar los mensajes de error
            limpiarMensajesError();

            if (data.success) {
                // Redirigir a la página especificada en la respuesta JSON
                window.location.href = data.redirect;
            } else {
                // Mostrar mensaje de error junto a los campos correspondientes
                mostrarMensajeError(data.message);
            }
        })        
        .catch(error => {
            console.error(error);
            // Mostrar mensaje de error junto a los campos correspondientes
            mostrarMensajeError("Error en el servidor.");
        });
    });

    function mostrarMensajeError(mensaje) {
        var mensajeErrorEmail = document.getElementById("mensajeErrorEmail");
        var mensajeErrorPass = document.getElementById("mensajeErrorPass");
        
        if (mensaje) {
            mensajeErrorEmail.innerText = mensaje;
            mensajeErrorPass.innerText = mensaje;
        }
    }

    // Agregar el siguiente código para mostrar el mensaje de error desde PHP
    var urlParams = new URLSearchParams(window.location.search);
    var errorParam = urlParams.get('error');
    if (errorParam) {
        mostrarMensajeError(decodeURIComponent(errorParam));
    }

    function limpiarMensajesError() {
        var mensajeErrorEmail = document.getElementById("mensajeErrorEmail");
        var mensajeErrorPass = document.getElementById("mensajeErrorPass");
        mensajeErrorEmail.innerText = "";
        mensajeErrorPass.innerText = "";
    }
});
