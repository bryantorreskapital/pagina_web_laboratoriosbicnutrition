<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>BIC NUTRITION</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="<?php  echo FS_PATH;?>lib/stylinggt/Site.css" rel="stylesheet">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php  echo FS_PATH;?>css/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Libraries Stylesheet -->
    <link href="<?php  echo FS_PATH;?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php  echo FS_PATH;?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php  echo FS_PATH;?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php  echo FS_PATH;?>css/style.css" rel="stylesheet">

    <!-- Incluir Toastr CDN -->
    <link href="<?php  echo FS_PATH;?>lib/toastr/toastr.min.css" rel="stylesheet"/>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
    <script src="https://formbuilder.online/assets/js/form-render.min.js"></script>
</head>

<style type="text/css">
    @media screen and (max-width: 480px) {
      #google_translate_element {
        width: 100% !important;
      }
    }    

    /* Estilos para el icono flotante */
    .whatsapp-float {
        position: fixed;
        bottom: 120px;
        right: 28px;
        z-index: 9999;
        font-size: 24px;
        color: #fff;
        background-color: #25d366;
        border-radius: 50%;
        text-align: center;
        line-height: 60px;
        width: 60px;
        height: 60px;
        transition: all 0.3s ease-in-out;
    }

    /* Estilos para el icono flotante al pasar el mouse */
    .whatsapp-float:hover {
        transform: scale(1.1);
        background-color: #128c7e;
    }

    .translate-button {
      position: fixed;
      bottom: 20px;
      left: 20px;
      background-color: #959595;
      color: #fff;
      padding: 10px;
      border-radius: 50%;
    }

    .translate-button a {
      color: #fff;
      text-decoration: none;
    }

    /*.no-translate {
      display: none;
    }*/

    /*#google_translate_element {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }*/
</style>

<div class="modal fade" id="translateModal" tabindex="-1" role="dialog" aria-labelledby="translateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="translateModalLabel">Traducción</h5>
                <button type="button" onclick="$('#translateModal').modal('hide');" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="google_translate_element"></div>
            </div>
        </div>
    </div>
</div>

<body>

    <div class="translate-button">
      <a href="#" onclick="gTranslate()">Traducir</a>
    </div>

    <?php $telefono=$this->var['telefono']='593988248665';?>
    <?php $text=$this->var['text']='Hola,%20vengo%20de%20su%20sitio%20web%20y%20estoy%20interesado%20en%20saber%20mas%20sobre%20sus%20productos.%20%C2%BFMe%20pueden%20ayudar%20con%20m%C3%A1s%20informaci%C3%B3n?';?>
    <!-- Icono de WhatsApp flotante -->
    <?php if( isset($fsc->tabla_empresa) && $fsc->tabla_empresa ){ ?>
        <?php $telefono=$this->var['telefono']=$fsc->tabla_empresa['telefono'];?>
        <?php $nombreEmpresa=$this->var['nombreEmpresa']=$fsc->tabla_empresa['nombre'];?>
        <?php $text=$this->var['text']="Hola,%20vengo%20del%20sitio%20web%20kapitalcompany.com%20de%20la%20empresa%20$nombreEmpresa%20. Me%20pueden%20ayudar%20con%20m%C3%A1s%20informaci%C3%B3n?";?>
    <?php } ?>
    
    <a href="https://wa.me/<?php echo $telefono;?>?text=<?php echo $text;?>" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!--<div class="container body-content">
    <div class="col-lg-4"></div>
    <div class="col-lg-2">
        <div class="col-lg-12" id="google_translate_element"></div>
    </div>
    <div class="col-lg-12"></div>
    </div>
    
    <br><br><br><br>-->

    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker text-primary me-2"></i>Quito, Ecuador</small>
                <small class="ms-4"><i class="fa fa-clock text-primary me-2"></i>9.00 am - 9.00 pm</small>
            </div>
            <div class="col-lg-6 px-0 text-end" translate="no">
                <small><i class="fa fa-envelope text-primary me-2" ></i>laboratoriosbicnutrition@gmail.com</small>
                <small class="ms-4"><i class="fa fa-phone text-primary me-2"></i>+593 098 8248 665</small>
                <small class="ms-4"></small>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s" style="background-color: rgb(140 203 59 / 92%); color: #fffff !important";">
            <a href="index.php?page=home" class="navbar-brand ms-2 ms-lg-0">
                <h1 class="display-18 text-dark m-0" translate="no">BIC NUTRITION</h1>
            </a>
            <!--<a href="index.php?page=home" class="navbar-brand ms-4 ms-lg-0">
              <svg width="400" height="100" viewBox="0 0 400 100">
                <style>
                  .text-dark-logo {
                    font-size: 2.5rem;
                    color: #666666 !important;;
                    font-family: Arial, sans-serif;
                    font-weight: bold;
                    text-decoration: none;
                  }
                </style>
                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" class="text-dark-logo">KAPITAL COMPANY</text>
              </svg>
            </a>-->
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.php?page=home" class="nav-item nav-link <?php if( $fsc->template=='home' ){ ?> active <?php } ?>">Inicio</a>
                    <a href="index.php?page=about" class="nav-item nav-link <?php if( $fsc->template=='about' ){ ?> active <?php } ?>">Nosotros</a>
                    <!--<a href="index.php?page=solutions" class="nav-item nav-link">Soluciones</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Portafolio</a>
                        <div class="dropdown-menu border-light m-0">
                            <a href="index.php?page=empresas" class="dropdown-item">Empresas</a>
                            <a href="index.php?page=cambio_iva" class="dropdown-item">Cambio I.V.A</a>
                            <!--<a href="team.html" class="dropdown-item">Team Member</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>-->
                        <!--</div>
                    </div>-->
                    <a href="index.php?page=productos" class="nav-item nav-link <?php if( $fsc->template=='productos' ){ ?> active <?php } ?>">Productos</a>
                    <a href="index.php?page=trabaja_nosotros" class="nav-item nav-link <?php if( $fsc->template=='trabaja_nosotros' ){ ?> active <?php } ?>">Trabaja Con Nosotros</a>
                    <a href="index.php?page=contact" class="nav-item nav-link <?php if( $fsc->template=='about' ){ ?> active <?php } ?>">Contacto</a>
                    <!--<a href="index.php?page=traducir" class="nav-item nav-link <?php if( $fsc->template=='traducir' ){ ?> active <?php } ?>">Traducir</a>-->
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="https://facebook.com/ecubicnutrition">
                        <small class="fab fa-facebook-f text-dark"></small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="https://instagram.com/ecubicnutrition">
                        <small class="fab fa-instagram text-dark"></small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="https://www.tiktok.com/@ecubicnutrition">
                        <small class="bi bi-tiktok text-dark"></small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
