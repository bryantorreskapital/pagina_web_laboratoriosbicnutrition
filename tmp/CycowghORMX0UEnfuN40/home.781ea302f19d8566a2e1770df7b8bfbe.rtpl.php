<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>
    
    <!-- Header con el video de fondo -->
    <header class="header-video">
        <video autoplay muted loop playsinline class="video-background">
            <source src="img/home/videos/HEADER2.mp4" type="video/mp4">
            Tu navegador no soporta la reproducción de videos.
        </video>

        <div class="overlay">
            <div class="text-center content">
                <img src="img/LOGO_SECUNDARIO.png" alt="BIC NUTRITION" class="logo mb-3">
                <h1 class="text-white">Nuestro Éxito</h1>
                <h1 class="text-white">es tu Salud</h1>
                <a href="index.php?page=about" class="btn btn-primary rounded-pill btn-lg mt-3">Nosotros</a>
            </div>
        </div>
    </header>

    <!-- Productos Start -->
    <div class="container-xxl py-5 fadeIn">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="img/home/productos/PRODUCTOS.jpg">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3"><a href="index.php?page=productos" class="text-primary">Productos</a> </p>
                    <h4 class="display-25 mb-4">Suplementos de Alta Calidad con Diseño Funcional para tu Día a Día</h4>
                    <p class="mb-4" align="justify">Nuestros productos no solo destacan por su calidad, sino también por su presentación práctica y conveniente. Cada producto está diseñado para facilitar su uso diario, con envases modernos y funcionales que garantizan su conservación óptima y facilidad de transporte. 

                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- Productos End -->

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.15s">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Diapositiva 1 -->
            <div class="carousel-item active carousel-slide-bg">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <img class="carousel-img" src="img/home/carousel-header/CARRUSEL1.png" alt="Imagen 1">
                </div>
            </div>

            <!-- Diapositiva 2 -->
            <div class="carousel-item carousel-slide-bg">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <img class="carousel-img" src="img/home/carousel-header/CARRUSEL2.png" alt="Imagen 2">
                </div>
            </div>

            <!-- Diapositiva 3 -->
            <div class="carousel-item carousel-slide-bg">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <img class="carousel-img" src="img/home/carousel-header/CARRUSEL3.png" alt="Imagen 3">
                </div>
            </div>

            <!-- Diapositiva 4 -->
            <div class="carousel-item carousel-slide-bg">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <img class="carousel-img" src="img/home/carousel-header/CARRUSEL4.png" alt="Imagen 4">
                </div>
            </div>

            <!-- Diapositiva 5 -->
            <div class="carousel-item carousel-slide-bg">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <img class="carousel-img" src="img/home/carousel-header/CARRUSEL5.png" alt="Imagen 5">
                </div>
            </div>

            <!-- Diapositiva 6 -->
            <div class="carousel-item carousel-slide-bg">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <img class="carousel-img" src="img/home/carousel-header/CARRUSEL6.png" alt="Imagen 6">
                </div>
            </div>

            <!-- Diapositiva 7 -->
            <div class="carousel-item carousel-slide-bg">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <img class="carousel-img" src="img/home/carousel-header/CARRUSEL7.png" alt="Imagen 7">
                </div>
            </div>
        </div>

        <!-- Controles del Carrusel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


    <!-- Producción Start -->
    <div class="container-xxl py-5 fadeIn">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="img/home/produccion/PRODUCCION.jpg">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Producción</p>
                    <h4 class="display-25 mb-4">Laboratorio con tecnología avanzada y procesos certificados</h4>
                    <p class="mb-4" align="justify">Elaboramos todos nuestros productos en una planta con tecnología avanzada y procesos certificados, garantizando la máxima seguridad en cada etapa de la fabricación. Cumplimos con todas las normativas sanitarias y controlamos rigurosamente cada lote para asegurar su pureza y calidad.
                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- Producción End -->

    <!-- Producción Start -->
    <!-- <div class="container-xxl py-5 fadeIn">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="img/home/formula/foto003.jpg">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Fórmula</p>
                    <h4 class="display-25 mb-4">Fórmulas Optimizadas para Resultados Visibles y Duraderos</h4>
                    <p class="mb-4" align="justify">Nuestras fórmulas están cuidadosamente optimizadas para maximizar los beneficios de cada ingrediente. Utilizamos combinaciones científicamente comprobadas que potencian la efectividad de nuestros suplementos, proporcionando resultados visibles y duraderos.
                    </p>

                </div>
            </div>
        </div>
    </div> -->
    <!-- Producción End -->

     <!-- About Start -->

     <!-- Page Header Start -->
    <!-- <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Nosotros</h1>
            <!--nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav-->
        <!-- </div>
    </div> -->
    <!-- Page Header End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="img/home/nosotros/LOGO_PRINCIPAL.png" width="250">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Nosotros</p>
                    <h4 class="display-25 mb-4">BIC Nutrition: Siete Años Transformando la Salud con Suplementos de Calidad Científica</h4>
                    <p class="mb-4" align="justify">BIC Nutrition fue fundada hace siete años en Estados Unidos con la misión de mejorar la salud y el bienestar de las personas a través de suplementos de la más alta calidad. Durante cinco años, nos consolidamos en el mercado estadounidense, ofreciendo productos diseñados para satisfacer las necesidades de nuestros clientes, respaldados por investigación científica y estándares rigurosos.


                    </p>
                    <a href="index.php?page=about" class="btn btn-primary py-1 px-5" href="">Leer Más</a>
                </div>
            </div>

        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <!-- <div class="container-fluid facts my-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-sm-7 col-lg-4 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-users fa-3x text-white mb-3"></i>
                    <h1 class="display-4 text-white" data-toggle="counter-up">1250</h1>
                    <span class="fs-5 text-white">Clientes Satisfechos</span>
                    <hr class="bg-white w-25 mx-auto mb-0">
                </div>
                <div class="col-sm-7 col-lg-4 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-check fa-3x text-white mb-3"></i>
                    <h1 class="display-4 text-white" data-toggle="counter-up">1250</h1>
                    <span class="fs-5 text-white">Proyectos Completados</span>
                    <hr class="bg-white w-25 mx-auto mb-0">
                </div>
                <div class="col-sm-7 col-lg-4 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-users-cog fa-3x text-white mb-3"></i>
                    <h1 class="display-4 text-white" data-toggle="counter-up">55</h1>
                    <span class="fs-5 text-white">Colaboradores</span>
                    <hr class="bg-white w-25 mx-auto mb-0">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Facts End -->


    <!-- Features Start -->
    <!-- <div class="container-xxl feature py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <!--<p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Why Choosing Us!</p>-->
                     <!-- <h1 class="display-5 mb-4">¡Razones por las que las nos eligen!</h1>
                    <p class="mb-4" align="justify">Los clientes nos eligen por nuestras bonificaciones exclusivas que ofrecen incentivos atractivos para distribuidores y farmacias, asegurando una colaboración rentable y beneficiosa. Además, brindamos un acompañamiento personalizado a través de un equipo especializado que ofrece apoyo constante y soluciones a medida en cada etapa del proceso. Por último, nuestra calidad garantizada es un sello distintivo, ya que todos nuestros suplementos cumplen con los más altos estándares internacionales, lo que asegura la confianza y satisfacción de nuestros clientes.
                    </p>
                    <!-- <a class="btn btn-primary py-3 px-5" href="">Leer Más</a> -->
                 <!-- </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-6">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="feature-box border rounded p-4">
                                        <!-- Reemplazado con un ícono de dinero -->
                                        <!-- <i class="fa fa-money-bill-wave fa-3x text-dark mb-3"></i>
                                        <h4 class="mb-3">1. Bonificaciones exclusivas</h4>
                                        <p class="mb-3">Ofrecemos atractivos incentivos y bonificaciones especiales para nuestros socios distribuidores y farmacias.</p>
                                        <!-- <a class="fw-semi-bold" href="index.php?page=personalization">Leer Más <i class="fa fa-arrow-right ms-1"></i></a> -->
                                    <!--</div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="feature-box border rounded p-4">
                                        <!-- Reemplazado con un ícono de usuario -->
                                        <!--<i class="fa fa-user-cog fa-3x text-dark mb-3"></i>
                                        <h4 class="mb-3">2. Acompañamiento personalizado</h4>
                                        <p class="mb-3">Contamos con un equipo especializado para brindarte apoyo constante y soluciones a medida en cada etapa del proceso.</p>
                                        <!-- <a class="fw-semi-bold" href="index.php?page=solutions">Leer Más <i class="fa fa-arrow-right ms-1"></i></a> -->
                                    <!-- </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                            <div class="feature-box border rounded p-4">
                                <!-- Reemplazado con un ícono de escudo -->
                                <!--<i class="fa fa-shield-alt fa-3x text-dark mb-3"></i>
                                <h4 class="mb-3">3. Calidad garantizada</h4>
                                <p class="mb-3">Nos comprometemos a ofrecer suplementos de la más alta calidad, respaldados por pruebas y estándares internacionales.</p>
                                <!-- <a class="fw-semi-bold" href="">Leer Más <i class="fa fa-arrow-right ms-1"></i></a> -->
                            <!--</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Features End -->

    <!-- Video Promo Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-5 mb-4">Catálogo BIC 2024</h1>
                    <p class="mb-4" align="justify">Conoce todos los detalles sobre nuestros productos y servicios a través de un video informativo diseñado para ayudarte a comprender por qué somos la mejor opción para tu bienestar y éxito. Explora cómo nuestras soluciones innovadoras pueden marcar la diferencia en tu negocio.</p>
                    <a class="btn btn-primary py-3 px-5" href="#videoModal" data-bs-toggle="modal">Ver Video</a>
                    <a class="btn btn-primary py-3 px-5" href="index.php?page=productos">Nuestros Productos</a>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="video-box position-relative">
                        <img class="img-fluid w-100 rounded" src="img/home/videos/cajas_bella.png" alt="Thumbnail del Video">
                        <a href="#videoModal" data-bs-toggle="modal" class="play-btn position-absolute top-50 start-50 translate-middle">
                            <i class="fa fa-play fa-3x text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Promo End -->

    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Catálogo BIC 2024</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <video controls>
                            <source src="img/home/videos/CATALOGO_BIC.mp4" type="video/mp4">
                            Tu navegador no soporta la etiqueta de video.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->

    

    <!-- Callback Start -->
    <div class="container-fluid callback my-5 pt-5">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                            <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">¿ Necesitas Ayuda ?
                            </p>
                            <h1 class="display-5 mb-5">Formulario de contacto</h1>
                        </div>
                        <form id="form-contacto" method="post">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Nombre y Apellido">
                                        <label for="name">Nombre y Apellido</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="mail" placeholder="Correo Electrónico">
                                        <label for="mail">Correo Electrónico</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="mobile" placeholder="Teléfono">
                                        <label for="mobile">Teléfono</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="¿Cómo podemos ayudarte?">
                                        <label for="subject">¿Cómo podemos ayudarte?</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message"
                                            style="height: 100px"></textarea>
                                        <label for="message">Mensaje</label>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Callback End -->


    <!-- Projects Start -->
    <!--<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Our Projects</p>
                <h1 class="display-5 mb-5">We Have Completed Latest Projects</h1>
            </div>
            <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.3s">
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="img/service-1.jpg" alt="">
                        <a href=""><i class="fa fa-link fa-3x text-primary"></i></a>
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Financial Planning</h4>
                    </div>
                </div>
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="img/service-2.jpg" alt="">
                        <a href=""><i class="fa fa-link fa-3x text-primary"></i></a>
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Cash Investment</h4>
                    </div>
                </div>
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="img/service-3.jpg" alt="">
                        <a href=""><i class="fa fa-link fa-3x text-primary"></i></a>
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Financial Consultancy</h4>
                    </div>
                </div>
                <div class="project-item pe-5 pb-5">
                    <div class="project-img mb-3">
                        <img class="img-fluid rounded" src="img/service-4.jpg" alt="">
                        <a href=""><i class="fa fa-link fa-3x text-primary"></i></a>
                    </div>
                    <div class="project-title">
                        <h4 class="mb-0">Business Loans</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Projects End -->


    <!-- Team Start -->
    <!--<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Our Team</p>
                <h1 class="display-5 mb-5">Exclusive Team</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <img class="img-fluid rounded" src="img/team-1.jpg" alt="">
                        <div class="team-text">
                            <h4 class="mb-0">Kate Winslet</h4>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <img class="img-fluid rounded" src="img/team-2.jpg" alt="">
                        <div class="team-text">
                            <h4 class="mb-0">Jac Jacson</h4>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <img class="img-fluid rounded" src="img/team-3.jpg" alt="">
                        <div class="team-text">
                            <h4 class="mb-0">Doris Jordan</h4>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Team End -->


    <!-- Testimonial Start -->
    <!--<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Testimonial</p>
                <h1 class="display-5 mb-5">What Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">
                <div class="testimonial-item">
                    <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                        <div class="btn-square bg-white border rounded-circle">
                            <i class="fa fa-quote-right fa-2x text-primary"></i>
                        </div>
                        Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem
                        lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                    </div>
                    <img class="rounded-circle mb-3" src="img/testimonial-1.jpg" alt="">
                    <h4>Client Name</h4>
                    <span>Profession</span>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                        <div class="btn-square bg-white border rounded-circle">
                            <i class="fa fa-quote-right fa-2x text-primary"></i>
                        </div>
                        Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem
                        lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                    </div>
                    <img class="rounded-circle mb-3" src="img/testimonial-2.jpg" alt="">
                    <h4>Client Name</h4>
                    <span>Profession</span>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                        <div class="btn-square bg-white border rounded-circle">
                            <i class="fa fa-quote-right fa-2x text-primary"></i>
                        </div>
                        Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem
                        lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                    </div>
                    <img class="rounded-circle mb-3" src="img/testimonial-3.jpg" alt="">
                    <h4>Client Name</h4>
                    <span>Profession</span>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                        <div class="btn-square bg-white border rounded-circle">
                            <i class="fa fa-quote-right fa-2x text-primary"></i>
                        </div>
                        Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem
                        lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                    </div>
                    <img class="rounded-circle mb-3" src="img/testimonial-4.jpg" alt="">
                    <h4>Client Name</h4>
                    <span>Profession</span>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Testimonial End -->

<script type="text/javascript">

</script>
<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>