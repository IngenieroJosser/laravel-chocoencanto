// Mostrar y ocultar el chatbox
function toggleChatbox() {
    var chatbox = document.getElementById('chatbox');
    chatbox.style.display = (chatbox.style.display === 'none' || chatbox.style.display === '') ? 'block' : 'none';
}

// Enviar mensaje simulado y redirigir a WhatsApp
function sendMessage() {
    var message = document.getElementById('chatbox-input').value;
    if (message.trim() !== "") {
        var chatboxContent = document.getElementById('chatbox-content');
        var userMessage = document.createElement('p');
        userMessage.textContent = message;
        userMessage.style.backgroundColor = '#dcf8c6'; // Color para los mensajes del usuario
        userMessage.style.textAlign = 'right';
        userMessage.style.fontFamily = 'text';
        chatboxContent.appendChild(userMessage);

        // Limpiar el input
        document.getElementById('chatbox-input').value = '';

        // Redirigir a WhatsApp con el mensaje
        setTimeout(function() {
            var whatsappLink = `https://wa.me/573232842193?text=${encodeURIComponent(message)}`;
            window.open(whatsappLink, '_blank');
        }, 500);
    }
}

// Asignar la función de abrir chatbox al botón de WhatsApp
document.getElementById('whatsapp-button').addEventListener('click', toggleChatbox);