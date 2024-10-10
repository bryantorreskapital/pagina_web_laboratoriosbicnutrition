<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>
	
	<!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s" style="background-color: #f8f9fa; padding: 100px 0;">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Contacto</h1>
            <!-- Opción para breadcrumb si es necesario -->
            <!--
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contacto</li>
                </ol>
            </nav>
            -->
        </div>
    </div>
    <!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form Start -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Contacto</p>
                <h1 class="display-5 mb-4">¿Tiene alguna consulta? Contáctenos</h1>
                <p class="mb-4">Complete el siguiente formulario con su información y su mensaje. Nos pondremos en contacto con usted lo antes posible.</p>

                <!-- Formulario de contacto -->
                <form id="form-contacto" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" required placeholder="Nombre y Apellido">
                                <label for="name">Nombre y Apellido</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="mail" required placeholder="Correo Electrónico">
                                <label for="mail">Correo Electrónico</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="mobile" required placeholder="Teléfono">
                                <label for="mobile">Teléfono (Ej: 0983828397)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" required placeholder="Asunto">
                                <label for="subject">Asunto</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea class="form-control" required placeholder="Escriba su mensaje aquí" id="message" style="height: 200px"></textarea>
                                <label for="message">Mensaje</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary py-3 px-5" type="submit">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Contact Form End -->

            <!-- Contact Image Start -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                <div class="position-relative rounded overflow-hidden h-100">
                    <img src="img/contacto/contacto.jpg" class="img-fluid" style="border-radius: 10px;">
                </div>
            </div>
            <!-- Contact Image End -->
        </div>
    </div>
</div>
<!-- Contact End -->


<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>