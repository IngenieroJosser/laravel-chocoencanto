<link href="{{ url('../../../../css/components/home/header.css') }}" rel="stylesheet">

<header>
    <a href="{{ url('/') }}"><h4>@ChocóEncanto</h4></a>

    <!-- Botón de menú hamburguesa -->
    <div class="menu-toggle">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>

    <!-- Contenedor del menú -->
    <div class="menu-content">
        <nav>
            <a href="{{ auth()->check() ? url('/site/reservas') : url('/login') }}">Reservas</a>
            <a href="#">Experiencias</a>
            <!-- Botón flotante de WhatsApp -->
            <div id="whatsapp-button" style="position: fixed; bottom: 45px; right: 20px;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" style="width: 50px; height: 50px; cursor: pointer;">
            </div>

            <!-- Chatbox de WhatsApp -->
            <div id="chatbox" style="display: none; position: fixed; bottom: 80px; right: 20px; width: 300px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); background-color: #ffffff; border: 1px solid #e6e6e6;">
                <div style="background-color: #25D366; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px; color: #ffffff;">
                    <strong style="font-family: text;">ChocóEncanto - Chat</strong>
                    <span style="float: right; cursor: pointer;" onclick="toggleChatbox()">&#10005;</span>
                </div>
                <div id="chatbox-content" style="padding: 10px; max-height: 200px; overflow-y: auto;">
                    <!-- <p style="font-family: text;">Hola, Bienvenido a ChocóEncanto, ¿en qué te puedo ayudar?</p> -->
                </div>
                <div style="padding: 10px; border-top: 1px solid #e6e6e6;">
                    <input type="text" id="chatbox-input" placeholder="Escribe tu mensaje..." style="width: calc(100% - 50px); padding: 5px; border: 1px solid #e6e6e6; border-radius: 5px; font-family: text;">
                    <button onclick="sendMessage()" style="background-color: #25D366; border: none; color: white; padding: 5px 10px; border-radius: 5px; cursor: pointer; font-family: text; margin-top: .7em;">Enviar</button>
                </div>
            </div>

        </nav>

        <div class="log-sign">
            @if (Auth::check())
                <span>Hola, <strong>{{ Auth::user()->user }}</strong>!</span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn1" style="color: #000;">Cerrar sesión</button>
                </form>
            @else
                <a href="{{ url('/login') }}" class="btn1">Iniciar sesión</a>
                <a href="{{ url('/register') }}" class="btn2">Únete</a>
            @endif
        </div>

    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const menuContent = document.querySelector('.menu-content');

    menuToggle.addEventListener('click', function () {
        menuContent.classList.toggle('active');
        menuToggle.classList.toggle('active');
    });
});

let userName = '';
let destination = '';
let numberOfPeople = '';
let tourDate = '';

// Mostrar y ocultar el chatbox
function toggleChatbox() {
    var chatbox = document.getElementById('chatbox');
    chatbox.style.display = (chatbox.style.display === 'none' || chatbox.style.display === '') ? 'block' : 'none';
}

// Enviar mensaje simulado y redirigir a WhatsApp o manejar respuestas
function sendMessage() {
    var message = document.getElementById('chatbox-input').value;
    if (message.trim() !== "") {
        var chatboxContent = document.getElementById('chatbox-content');
        var userMessage = document.createElement('p');
        userMessage.textContent = message;
        userMessage.style.backgroundColor = '#dcf8c6'; // Color para los mensajes del usuario
        userMessage.style.padding = '.5em .8em';
        userMessage.style.borderRadius = '10px';
        userMessage.style.textAlign = 'right';
        userMessage.style.fontFamily = 'text';
        chatboxContent.appendChild(userMessage);

        // Limpiar el input
        document.getElementById('chatbox-input').value = '';

        // Manejar la respuesta del usuario
        handleUserResponse(message);
    }
}

// Función para iniciar la conversación
function startConversation() {
    var chatboxContent = document.getElementById('chatbox-content');
    var introMessage = document.createElement('p');
    introMessage.textContent = "¡Hola! Bienvenido a ChocóEncanto. ¿Cómo te llamás?";
    introMessage.style.backgroundColor = '#ffffff';
    introMessage.style.padding = '.5em .8em';
    introMessage.style.borderRadius = '10px';
    introMessage.style.textAlign = 'left';
    introMessage.style.fontFamily = 'text';
    chatboxContent.appendChild(introMessage);
}

// Función para manejar las respuestas del usuario
function handleUserResponse(message) {
    var chatboxContent = document.getElementById('chatbox-content');
    
    // Convertir el mensaje a minúsculas para facilitar la comparación
    var lowerCaseMessage = message.trim().toLowerCase();
    
    // Verificar si el usuario quiere salir
    if (lowerCaseMessage === "no" || lowerCaseMessage === "cancelar" || lowerCaseMessage === "salir") {
        var botMessage = document.createElement('p');
        botMessage.textContent = "Parece que no deseas continuar. ¿Te gustaría visitar nuestra página de Instagram?";
        botMessage.style.backgroundColor = '#ffffff';
        botMessage.style.padding = '.5em 1em';
        botMessage.style.borderRadius = '10px';
        botMessage.style.textAlign = 'left';
        botMessage.style.fontFamily = 'text';
        chatboxContent.appendChild(botMessage);

        // Botón para redirigir a Instagram
        var instagramButton = document.createElement('button');
        // instagramButton.textContent = "Ir a Instagram";
        // instagramButton.style.backgroundColor = '#E1306C';
        // instagramButton.style.color = 'white';
        instagramButton.style.border = 'none';
        instagramButton.style.padding = '5px 10px'; 
        instagramButton.style.borderRadius = '50%';
        instagramButton.style.cursor = 'pointer';
        instagramButton.style.marginTop = '10px';
        instagramButton.style.fontFamily = 'text';
        instagramButton.style.marginLeft = '6%';
        instagramButton.style.width = '24px';
        instagramButton.style.height = '24px';
        instagramButton.style.objectFit = 'cover';
        instagramButton.style.backgroundImage = "url('/icons/th-instagram.png')";
        instagramButton.style.backgroundSize = "cover";
        instagramButton.style.backgroundPosition = "center"
        instagramButton.style.color = "transparent";
        instagramButton.style.border = "none";

        instagramButton.onclick = function() {
            window.open('https://www.instagram.com/itsjosser/', '_blank');
        };
        chatboxContent.appendChild(instagramButton);

        // Botón para redirigir a Facebook
        var facebookButton = document.createElement('button');
        // facebookButton.textContent = "Ir a Facebook";
        // facebookButton.style.backgroundColor = '#051923';
        // facebookButton.style.color = 'white';
        facebookButton.style.border = 'none';
        facebookButton.style.padding = '5px 10px';
        facebookButton.style.borderRadius = '5px';
        facebookButton.style.cursor = 'pointer';
        facebookButton.style.marginTop = '10px';
        facebookButton.style.marginLeft = '17%';
        // facebookButton.style.fontFamily = 'text';
        facebookButton.style.backgroundImage = "url('/icons/th-facebook.png')";
        facebookButton.style.backgroundSize = "cover";
        facebookButton.style.backgroundPosition = "center";
        facebookButton.style.color = "transparent";
        facebookButton.style.border = "none";
        facebookButton.style.backgroundPosition = "center";
        facebookButton.style.width = '24px';
        facebookButton.style.height = '24px';

        facebookButton.onclick = function() {
            window.open('https://www.facebook.com/allinson.tomm/?_rdc=3&_rdr', '_blank');
        };
        chatboxContent.appendChild(facebookButton);



        // Botón para redirigir a Telegram
        var telegramButton = document.createElement('button');
        // telegramButton.textContent = "Ir a Facebook";
        // telegramButton.style.backgroundColor = '#051923';
        // telegramButton.style.color = 'white';
        telegramButton.style.border = 'none';
        telegramButton.style.padding = '5px 10px';
        telegramButton.style.borderRadius = '5px';
        telegramButton.style.cursor = 'pointer';
        telegramButton.style.marginTop = '10px';
        telegramButton.style.marginLeft = '17%';
        // telegramButton.style.fontFamily = 'text';
        telegramButton.style.backgroundImage = "url('/icons/th-telegram.png')";
        telegramButton.style.backgroundSize = "cover";
        telegramButton.style.backgroundPosition = "center";
        telegramButton.style.color = "transparent";
        telegramButton.style.border = "none";
        telegramButton.style.backgroundPosition = "center";
        telegramButton.style.width = '24px';
        telegramButton.style.height = '24px';

        telegramButton.onclick = function() {
            window.open('https://telegram.org/dl', '_blank');
        };
        chatboxContent.appendChild(telegramButton);



        // Botón para redirigir a Gmail
        var googleButton = document.createElement('button');
        // googleButton.textContent = "Ir a Facebook";
        // googleButton.style.backgroundColor = '#051923';
        // googleButton.style.color = 'white';
        googleButton.style.border = 'none';
        googleButton.style.padding = '5px 10px';
        googleButton.style.borderRadius = '5px';
        googleButton.style.cursor = 'pointer';
        googleButton.style.marginTop = '10px';
        googleButton.style.marginLeft = '17%';
        // googleButton.style.fontFamily = 'text';
        googleButton.style.backgroundImage = "url('/icons/th-gmail.png')";
        googleButton.style.backgroundSize = "cover";
        googleButton.style.backgroundPosition = "center";
        googleButton.style.color = "transparent";
        googleButton.style.border = "none";
        googleButton.style.backgroundPosition = "center";
        googleButton.style.width = '24px';
        googleButton.style.height = '24px';

        googleButton.onclick = function() {
            window.open('https://mail.google.com/mail/u/3/#inbox', '_blank');
        };
        chatboxContent.appendChild(googleButton);

        // Limitar el scroll
        chatboxContent.scrollTop = chatboxContent.scrollHeight;

        return; // Terminar la función para evitar otras interacciones
    }

    // Continuar con el flujo normal de conversación
    if (!userName) {
        userName = message;
        var botMessage = document.createElement('p');
        botMessage.textContent = `¡Hola ${userName}! ¿Qué destino turístico te gustaría visitar?`;
        botMessage.style.backgroundColor = '#ffffff';
        botMessage.style.padding = '.5em .8em';
        botMessage.style.borderRadius = '10px';
        botMessage.style.textAlign = 'left';
        botMessage.style.fontFamily = 'text';
        chatboxContent.appendChild(botMessage);
    } else if (!destination) {
        destination = message;
        var botMessage = document.createElement('p');
        botMessage.textContent = `¡Genial! ¿Cuántas personas asistirán al tour?`;
        botMessage.style.backgroundColor = '#ffffff';
        botMessage.style.padding = '.5em .8em';
        botMessage.style.borderRadius = '10px';
        botMessage.style.textAlign = 'left';
        botMessage.style.fontFamily = 'text';
        chatboxContent.appendChild(botMessage);
    } else if (!numberOfPeople) {
        // Validación para la cantidad de personas
        if (isNaN(message) || parseInt(message) <= 0) {
            var botMessage = document.createElement('p');
            botMessage.textContent = "Por favor, ingresa un número mayor a cero para la cantidad de personas.";
            botMessage.style.backgroundColor = '#ffffff';
            botMessage.style.padding = '.5em .8em';
            botMessage.style.borderRadius = '10px';
            botMessage.style.textAlign = 'left';
            botMessage.style.fontFamily = 'text';
            chatboxContent.appendChild(botMessage);
        } else {
            numberOfPeople = message;
            var botMessage = document.createElement('p');
            botMessage.textContent = `Perfecto. ¿Qué fechas te interesan para la reserva?`;
            botMessage.style.backgroundColor = '#ffffff';
            botMessage.style.padding = '.5em .8em';
            botMessage.style.borderRadius = '10px';
            botMessage.style.textAlign = 'left';
            botMessage.style.fontFamily = 'text';
            chatboxContent.appendChild(botMessage);
        }
    } else if (!tourDate) {
        tourDate = message;
        var botMessage = document.createElement('p');
        botMessage.textContent = `¡Todo listo para tu reserva! Recapitulamos: ${destination}, ${numberOfPeople} personas, en ${tourDate}. ¿Está todo correcto?`;
        botMessage.style.backgroundColor = '#ffffff';
        botMessage.style.padding = '.5em .8em';
        botMessage.style.borderRadius = '10px';
        botMessage.style.textAlign = 'left';
        botMessage.style.fontFamily = 'text';
        chatboxContent.appendChild(botMessage);

        // Redirigir a WhatsApp
        setTimeout(function() {
            var whatsappMessage = `¡Hola! Quiero hacer una reserva en ChocóEncanto. Destino: ${destination}, ${numberOfPeople} personas, fecha: ${tourDate}.`;
            var whatsappLink = `https://wa.me/573232842193?text=${encodeURIComponent(whatsappMessage)}`;
            window.open(whatsappLink, '_blank');
        }, 1500);
    }

    // Limitar el scroll
    chatboxContent.scrollTop = chatboxContent.scrollHeight;
}

// Iniciar la conversación automáticamente
window.onload = function() {
    startConversation();
};

// Asignar la función de abrir chatbox al botón de WhatsApp
document.getElementById('whatsapp-button').addEventListener('click', toggleChatbox);

</script>
