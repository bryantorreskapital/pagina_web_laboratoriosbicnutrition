<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>

    <!-- Page Header Start -->
    <!--<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">404 Error</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">404 Error</li>
                </ol>
            </nav>
        </div>
    </div>-->
    <!-- Page Header End -->
    <div class="container-fluid mb-5 wow fadeIn" data-wow-delay="0.1s">
    </div>	
    <br>
    <br>
    <br>

    <!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">404</h1>
                    <h1 class="mb-4">Página No Encontrada</h1>
                    <p class="mb-4">¡Lo sentimos, la página que has buscado no existe en nuestro sitio web! ¿Quizás ir a nuestra página de inicio o intentar usar una búsqueda?</p>
                    <a class="btn btn-primary py-3 px-5" href="index.php?page=inicio">Regresa al Inicio</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>