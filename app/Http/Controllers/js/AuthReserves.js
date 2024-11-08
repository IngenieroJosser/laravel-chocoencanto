document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('reserva-form').onsubmit = function(event) {
        event.preventDefault(); // Prevenir el envío normal del formulario

        let formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest' // Indica que es una petición AJAX
            }
        })
        .then(response => {
            if (!response.ok) {
                // Si la respuesta no es correcta, lanzar un error
                throw new Error('Error en la respuesta del servidor.');
            }
            return response.json(); // Parsear la respuesta JSON
        })
        .then(data => {
            if (data.success) {
                showModal(data.message, 'success'); // Mostrar mensaje de éxito
                this.reset(); // Reiniciar el formulario
            } else {
                showModal(data.message, 'error'); // Mostrar mensaje de error desde el servidor
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showModal('Ocurrió un error, intenta nuevamente.', 'error'); // Mostrar mensaje de error genérico
        });
    };

    function showModal(message, type) {
        const modalMessageElement = document.getElementById('modal-message');
        modalMessageElement.innerText = message; // Mostrar el mensaje en la etiqueta <p>
        
        // Cambiar el color del texto según el tipo
        if (type === 'success') {
            modalMessageElement.style.color = 'green'; // Color verde para éxito
        } else {
            modalMessageElement.style.color = 'red'; // Color rojo para error
        }
        
        document.getElementById('modal').style.display = 'block'; // Mostrar el modal
    }

    document.getElementById('close-modal').onclick = function() {
        document.getElementById('modal').style.display = 'none'; // Cerrar el modal
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById('modal')) {
            document.getElementById('modal').style.display = 'none'; // Cerrar el modal si se hace clic fuera
        }
    }
});
