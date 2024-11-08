document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('reserva-form'); // Asegúrate de que el ID coincide con tu HTML

    form.onsubmit = function(event) {
        event.preventDefault();

        // Crear un objeto FormData con los datos del formulario
        let formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json' // Solicita respuesta en formato JSON
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor.');
            }
            return response.json(); // Parsear como JSON
        })
        .then(data => {
            if (data.success) {
                showModal(data.message, 'success'); // Mostrar mensaje de éxito
                this.reset(); // Reiniciar el formulario tras éxito
            } else {
                showModal(data.message, 'error'); // Mostrar mensaje de error recibido
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showModal('Ocurrió un error, intenta nuevamente.', 'error'); // Mostrar mensaje de error genérico
        });
    };

    // Función para mostrar el modal con el mensaje y tipo de mensaje
    function showModal(message, type) {
        const modalMessageElement = document.getElementById('modal-message');
        modalMessageElement.innerText = message;

        // Cambiar color según el tipo de mensaje
        modalMessageElement.style.color = (type === 'success') ? 'green' : 'red';

        // Mostrar el modal
        document.getElementById('modal').style.display = 'block';
    }

    // Cerrar el modal al hacer clic en el botón de cierre
    document.getElementById('close-modal').onclick = function() {
        document.getElementById('modal').style.display = 'none';
    };

    // Cerrar el modal al hacer clic fuera de él
    window.onclick = function(event) {
        if (event.target == document.getElementById('modal')) {
            document.getElementById('modal').style.display = 'none';
        }
    };
});
