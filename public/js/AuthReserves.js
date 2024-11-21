document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('reserva-form');

    form.onsubmit = function (event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            },
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor.');
                }
                return response.json();
            })
            .then((data) => {
                if (data.success) {
                    showModal(data.message, 'success');
                    this.reset();
                } else {
                    showModal(data.message || 'Algo salió mal.', 'error');
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                showModal('Ocurrió un error, intenta nuevamente.', 'error');
            });
    };

    function showModal(message, type) {
        const modalMessageElement = document.getElementById('modal-message');
        modalMessageElement.innerText = message;
        modalMessageElement.style.color = type === 'success' ? 'green' : 'red';

        const modal = document.getElementById('modal');
        modal.style.display = 'flex';

        // Cierre automático del modal tras 5 segundos
        setTimeout(() => {
            modal.style.display = 'none';
        }, 5000);
    }

    document.getElementById('close-modal').onclick = function () {
        document.getElementById('modal').style.display = 'none';
    };

    window.onclick = function (event) {
        if (event.target == document.getElementById('modal')) {
            document.getElementById('modal').style.display = 'none';
        }
    };
});
