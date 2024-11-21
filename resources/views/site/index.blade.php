<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="{{ url('../../../../css/index.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/favicon-16x16.png') }}" type="image/png">
    <title>Chocoencanto - Sitio Oficial</title>
</head>
<body>
    @include('partials.header')

    <section class='presentation'>
        <div class="left-content">
            <h1>Un viaje al corazón del Pacífico colombiano, donde la tradición y la modernidad se encuentran.</h1>
            <p>Reserva tu viaje hoy y vive la experiencia a lo Chocó Encanto.</p>
            <a href="{{ auth()->check() ? url('/reservas') : url('/login') }}" class='see-you-soon'>¡Haz tu reserva!</a>
        </div>

        <div class="right-content">
            <img src="{{ asset('../../../../img/catedral.jpeg') }}" alt="catedral de Quibdó" />
            <p>Plaza catedral del Quibdó San Francisco de Asís</p>
        </div>
    </section>

    <div class="places">
        <img src="{{ asset('img/place1.avif') }}"alt="Naturaleza">
        <img src="{{ asset('img/place2.jpeg') }}"alt="Naturaleza">
        <img src="{{ asset('img/place3.avif') }}"alt="Naturaleza">
        <img src="{{ asset('img/place4.jpeg') }}"alt="Naturaleza">
        <img src="{{ asset('img/place5.jpeg') }}"alt="Naturaleza">
        <img src="{{ asset('img/place6.jpg') }}"alt="Naturaleza">
    </div>

    <section id='services'>
        <div class="services-wrapper">
            <!-- <h3>Nuestros servicios</h3> -->
            <div class="services-content">
                <div class="service-item">
                    <img src="{{ asset('icons/cart.png') }}" alt="Servicio 1" />
                    <h3>Gastronomia de calidad</h3>
                    <p>Juntos degusten todo un viaje gastronómico único en Quibdó, Chocó, donde cada plato cuenta una historia de tradición y sabor auténtico. Descubre los secretos culinarios de esta región exuberante mientras te sumerges en la riqueza de su cocina local.</p>
                </div>

                <div class="service-item">
                    <img src="{{ asset('icons/forest.png') }}" alt="Servicio 2" />
                    <h3>Visitas ecológicas</h3>
                    <p>¡Descubran la magia de la naturaleza en Quibdó, Chocó! Nuestras visitas ecológicas te llevan a los rincones más impresionantes de esta región, donde la exuberante selva tropical se fusiona con ríos cristalinos y cascadas majestuosas.</p>
                </div>

                <div class="service-item">
                    <img src="{{ asset('icons/coin.png') }}" alt="Facilidad de pago" />
                    <h3>Facilidad de pago</h3>
                    <p>¡Descubran el mundo con facilidad! En nuestra empresa de turismo, hemos reinventado la forma en que viajas y pagas. Con nuestras increíbles facilidades de pago, ahora es más accesible que nunca realizar el viaje de tus sueños.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="content-user">
            <!-- Tarjeta de Testimonio 1 -->
            <div class="testimony-box">
                <div class="user">
                    <img src="{{ asset('img/user1.jpg') }}" alt="Foto del usuario">
                    <p class="name">Josser Cordoba</p>
                </div>
                <p>Mi experiencia con ChocóEncanto fue inolvidable...</p>
                <a href="#">Visítalo</a>
            </div>

            <!-- Tarjeta de Testimonio 2 -->
            <div class="testimony-box">
                <div class="user">
                    <img src="{{ asset('img/user2.webp') }}" alt="Foto del usuario">
                    <p class="name">Lebron James</p>
                </div>
                <p>Viajar con ChocóEncanto fue una experiencia espectacular...</p>
                <a href="#">Visítalo</a>
            </div>

            <!-- Tarjeta de Testimonio 3 -->
            <div class="testimony-box">
                <div class="user">
                    <img src="{{ asset('img/technova.png') }}" alt="Foto del usuario">
                    <p class="name">TechNova</p>
                </div>
                <p>Como empresa de tecnología, estamos acostumbrados...</p>
                <a href="#">Visítalo</a>
            </div>
        </section>


    <footer>
        <span>Síguenos</span>
        
        <div class="social-media">
            <a href="https://web.facebook.com/allinson.tomm/?_rdc=2&_rdr"><img src="{{ asset('icons/facebook.png') }}" alt="facebook" /></a>
            <a href="https://www.instagram.com/itsjosser/"><img src="{{ asset('icons/instagram.png') }}" alt="instagram" /></a>
            <a href="https://twitter.com/JosserCordoba"><img src="{{ asset('icons/twitter.png') }}" alt="twitter" /></a>
            <a href="https://www.youtube.com/channel/UCxXr04IWXRAnUAdRvLszIFQ"><img src="{{ asset('icons/youtube.png') }}" alt="youtube" /></a>
        </div>
        
        <p>Descubre la belleza natural de Quibdó, Chocó, con nuestros tours ecológicos y gastronómicos. Sumérgete en la cultura local y vive experiencias inolvidables en este paraíso tropical. ¡Reserva ahora y comienza tu aventura con nosotros!</p>
        <p>Calle 29 # 4-50, Barrio El Poblado, 270007 Quibdó, Chocó, Colombia, COLOMBIA</p>
        <a class='login-footer' >Registrarse</a>
        <span class='all-right'> &copy; 2024 Todos los derechos reservados</span>
        <span class='all'> &copy;Desarrollado por <span>Josser Cordoba Rivas</span></span>
    </footer>

    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
