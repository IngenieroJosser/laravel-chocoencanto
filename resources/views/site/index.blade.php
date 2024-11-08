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
            <a href="{{ auth()->check() ? url('/site/reservas') : url('/login') }}" class='see-you-soon'>¡Haz tu reserva!</a>
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


    <div class='content-user'>
        <div class="testimony-box">
            <div class="user">
                <img src="{{ asset('img/user1.jpg') }}" alt="Usuario" />
                <p class='name'>Josser Cordoba</p>
                <svg aria-label="Verificado" class="verificed" color="rgb(0, 149, 246)" fill="rgb(0, 149, 246)" height="12" role="img" viewBox="0 0 40 40" width="12">
                    <title>Verificado</title>
                    <path d="M19.998 3.094 14.638 0l-2.972 5.15H5.432v6.354L0 14.64 3.094 20 0 25.359l5.432 3.137v5.905h5.975L14.638 40l5.36-3.094L25.358 40l3.232-5.6h6.162v-6.01L40 25.359 36.905 20 40 14.641l-5.248-3.03v-6.46h-6.419L25.358 0l-5.36 3.094Zm7.415 11.225 2.254 2.287-11.43 11.5-6.835-6.93 2.244-2.258 4.587 4.581 9.18-9.18Z" fill-rule="evenodd"></path>
                </svg>
            </div>
            <span></span>
            <p class='word-user'>Mi experiencia con ChocóEncanto fue inolvidable. Desde el momento de la reserva hasta cada actividad, todo fue perfecto. El equipo fue atento y se encargó de que disfrutara de la belleza natural del Chocó de una manera única y auténtica. Las playas, la selva y el contacto con las comunidades locales hicieron que cada día fuera una aventura increíble. Definitivamente recomiendo ChocóEncanto a cualquiera que busque una conexión profunda con la naturaleza y la cultura del Chocó.</p>
            <a class='link' href="#">Visítalo</a>
        </div>

        <div class="testimony-box">
            <div class="user">
                <img src="{{ asset('img/user2.webp') }}" alt="Usuario" />
                <p class='name'>Lebron James</p>
                <svg aria-label="Verificado" class="verificed" color="rgb(0, 149, 246)" fill="rgb(0, 149, 246)" height="12" role="img" viewBox="0 0 40 40" width="12">
                    <title>Verificado</title>
                    <path d="M19.998 3.094 14.638 0l-2.972 5.15H5.432v6.354L0 14.64 3.094 20 0 25.359l5.432 3.137v5.905h5.975L14.638 40l5.36-3.094L25.358 40l3.232-5.6h6.162v-6.01L40 25.359 36.905 20 40 14.641l-5.248-3.03v-6.46h-6.419L25.358 0l-5.36 3.094Zm7.415 11.225 2.254 2.287-11.43 11.5-6.835-6.93 2.244-2.258 4.587 4.581 9.18-9.18Z" fill-rule="evenodd"></path>
                </svg>
            </div>
            <span></span>
            <p class='word-user'>Viajar con ChocóEncanto fue una experiencia espectacular. La belleza del Chocó es impresionante, y gracias al equipo, pude disfrutarla al máximo. La atención al detalle y la organización de todo el viaje fueron de primera clase. Si estás buscando una aventura en un paraíso natural, ChocóEncanto es la mejor opción. ¡No podría recomendarlo más!</p>
            <a class='link' href="#">Visítalo</a>
        </div>

        <div class="testimony-box">
            <div class="user">
                <img src="{{ asset('img/technova.png') }}" alt="Usuario" />
                <p class='name'>TechNova</p>
                <svg aria-label="Verificado" class="verificed" color="rgb(0, 149, 246)" fill="rgb(0, 149, 246)" height="12" role="img" viewBox="0 0 40 40" width="12">
                    <title>Verificado</title>
                    <path d="M19.998 3.094 14.638 0l-2.972 5.15H5.432v6.354L0 14.64 3.094 20 0 25.359l5.432 3.137v5.905h5.975L14.638 40l5.36-3.094L25.358 40l3.232-5.6h6.162v-6.01L40 25.359 36.905 20 40 14.641l-5.248-3.03v-6.46h-6.419L25.358 0l-5.36 3.094Zm7.415 11.225 2.254 2.287-11.43 11.5-6.835-6.93 2.244-2.258 4.587 4.581 9.18-9.18Z" fill-rule="evenodd"></path>
                </svg>
            </div>
            <span></span>
            <p class='word-user'>Como empresa de tecnología, estamos acostumbrados a procesos eficientes y bien estructurados, y ChocóEncanto no nos decepcionó. Desde el proceso de reserva hasta cada excursión, la atención al cliente fue excepcional. La biodiversidad y la naturaleza del Chocó, combinadas con la excelente organización de ChocóEncanto, hicieron que nuestra experiencia fuera única. Recomendamos sus servicios para cualquier persona o empresa que quiera disfrutar de una experiencia inolvidable en el Chocó.</p>
            <a class='link' href="#">Visítalo</a>
        </div>
    </div>

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
