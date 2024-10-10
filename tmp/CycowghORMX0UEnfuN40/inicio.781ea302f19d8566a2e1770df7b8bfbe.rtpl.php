<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8">
                                    <p
                                        class="d-inline-block border border-white rounded text-primary fw-semi-bold py-1 px-3 animated slideInDown">
                                        BIENVENIDO</p>
                                    <h1 class="display-1 mb-4 animated slideInDown">SISTEMA KAPITAL
                                    </h1>
                                    <!--<a href="" class="btn btn-primary py-3 px-5 animated slideInDown">Leer Más</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <!--<p
                                        class="d-inline-block border border-white rounded text-primary fw-semi-bold py-1 px-3 animated slideInDown">
                                        Welcome to Finanza</p>-->
                                    <h1 class="display-1 mb-4 animated slideInDown">EL SISTEMA MAS COMPLETO DEL PAIS</h1>
                                    <!--<a href="" class="btn btn-primary py-3 px-5 animated slideInDown">Leer Más</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("cont-about") . ( substr("cont-about",-1,1) != "/" ? "/" : "" ) . basename("cont-about") );?>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-fluid facts my-5 py-5">
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
    </div>
    <!-- Facts End -->


    <!-- Features Start -->
    <div class="container-xxl feature py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <!--<p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Why Choosing Us!</p>-->
                    <h1 class="display-5 mb-4">¡Razones por las que las empresas nos eligen!</h1>
                    <p class="mb-4" align="justify">En KAPITAL COMPANY, nos enorgullece ofrecer soluciones de software ERP altamente personalizadas a nuestros clientes. Desde nuestros inicios, nos hemos esforzado por entender y adaptarnos a los procesos únicos de cada empresa. Las empresas nos eligen porque saben que pueden confiar en nosotros para ayudarles a alcanzar sus metas y mejorar sus procesos.
                    </p>
                    <a class="btn btn-primary py-3 px-5" href="">Leer Más</a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-6">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="feature-box border rounded p-4">
                                        <i class="fa fa-check fa-3x text-dark mb-3"></i>
                                        <h4 class="mb-3">Personalización</h4>
                                        <p class="mb-3">Nos esforzamos por comprender los esfuerzos únicos de cada empresa y desarrollar soluciones que se ajusten a sus necesidades</p>
                                        <a class="fw-semi-bold" href="">Leer Más <i
                                                class="fa fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="feature-box border rounded p-4">
                                        <i class="fa fa-check fa-3x text-dark mb-3"></i>
                                        <h4 class="mb-3">Experiencia</h4>
                                        <p class="mb-3">Con más de 10 años de experiencia en el mercado ecuatoriano, somos líderes reconocidos en el desarrollo de soluciones de software ERP.</p>
                                        <a class="fw-semi-bold" href="">Leer Más <i
                                                class="fa fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                            <div class="feature-box border rounded p-4">
                                <i class="fa fa-check fa-3x text-dark mb-3"></i>
                                <h4 class="mb-3">Soporte Técnico</h4>
                                <p class="mb-3">Nuestro equipo de soporte técnico está disponible 24 horas, los 7 días de la semana para brindar soporte ilimitado a nuestros clientes.</p>
                                <a class="fw-semi-bold" href="">Leer Más <i class="fa fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("cont-solutions") . ( substr("cont-solutions",-1,1) != "/" ? "/" : "" ) . basename("cont-solutions") );?>

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