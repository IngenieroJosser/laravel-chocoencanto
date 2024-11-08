// Espera a que el contenido del documento esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        // Recoge el valor de la contraseña
        const password = document.getElementById('password').value;
        const passwordHelp = document.getElementById('passwordHelp');
        
        // Verificar la longitud de la contraseña
        if (password.length < 8) {
            e.preventDefault(); // Evita el envío del formulario
            passwordHelp.style.display = 'block'; // Muestra el mensaje de ayuda
            return; // Sale de la función para no enviar el formulario
        } else {
            passwordHelp.style.display = 'none'; // Oculta el mensaje de ayuda
        }

        e.preventDefault(); // Evita el envío del formulario por defecto

        // Recoge los datos del formulario
        const formData = new FormData(this);

        // Realiza la solicitud fetch
        fetch(this.action, {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            if (response.ok) {
                // Si la respuesta es exitosa, convierte a JSON
                return response.json();
            }
            // Si la respuesta no es exitosa, lanza un error
            return response.json().then(err => Promise.reject(err));
        })
        .then(data => {
            // Muestra el modal de éxito
            const modal = document.getElementById('successModal');
            const successMessage = document.getElementById('successMessage');

            successMessage.textContent = data.message; // Muestra el mensaje de éxito
            modal.style.display = 'block'; // Muestra el modal

            // Cierra el modal al hacer clic en la 'x'
            document.querySelector('.close').onclick = function() {
                modal.style.display = 'none';
            };

            // Cierra el modal al hacer clic fuera de él
            window.onclick = function(event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            };

            // Reinicia el formulario
            this.reset();
        })
        .catch(error => {
            console.error('Error:', error);
        
            // Si la respuesta contiene errores, mostrarlos en el modal
            if (error.errors) {
                const errorMessage = error.errors[Object.keys(error.errors)[0]][0]; // Obtiene el primer error
                const errorModal = document.getElementById('errorModal');
                const errorMessageElement = document.getElementById('errorMessage');
        
                errorMessageElement.textContent = errorMessage; // Muestra el mensaje de error
                errorModal.style.display = 'block'; // Muestra el modal de error
            } else {
                const errorMessage = 'Ocurrió un error inesperado.';
                const errorModal = document.getElementById('errorModal');
                const errorMessageElement = document.getElementById('errorMessage');
        
                errorMessageElement.textContent = errorMessage; // Muestra el mensaje de error
                errorModal.style.display = 'block'; // Muestra el modal de error
            }
        
            // Cierra el modal de error al hacer clic en la 'x'
            document.querySelector('.close').onclick = function() {
                errorModal.style.display = 'none';
            };
        
            // Cierra el modal de error al hacer clic fuera de él
            window.onclick = function(event) {
                if (event.target === errorModal) {
                    errorModal.style.display = 'none';
                }
            };
        });                
    });
});
