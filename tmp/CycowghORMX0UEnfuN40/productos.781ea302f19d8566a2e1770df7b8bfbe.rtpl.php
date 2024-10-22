<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s"  >
    <div class="container">
        <h1 class="display-3 mb-4 animated slideInRight">Productos</h1>
    </div>
</div>
<!-- Page Header End -->

    <!-- Personalization Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="border rounded p-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4">
                    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="h-100">
                            <div class="d-flex">
                                <div class="ps-3">
                                    <span align='justify'>En BIC Nutrition, ofrecemos suplementos de la más alta calidad, desarrollados bajo estrictos estándares de producción en una planta certificada que cuenta con todos los permisos sanitarios requeridos. Cada uno de nuestros productos está avalado por notificaciones sanitarias vigentes y respaldado por rigurosos estudios científicos que garantizan la eficacia y seguridad de sus componentes. Nos comprometemos a proporcionar soluciones nutricionales confiables, diseñadas para satisfacer las necesidades de nuestros clientes y contribuir a su bienestar integral.</span>
                                </div>
                                <div class="border-end d-none d-lg-block"></div>
                            </div>
                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 text-center fadeIn" id="categorias">
        <div class="row">
            <div class="col-md-3 mb-4">
                <a href="#" class="btn btn-animated animate__animated"  onclick="showProducts('colagenos', event)">
                    <i class="fas fa-dna fa-3x mb-2"></i>
                    <h5>Colágenos</h5>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="#" class="btn btn-animated animate__animated">
                    <i class="fas fa-lungs fa-3x mb-2"></i>
                    <h5>Hepatoprotector</h5>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="#" class="btn btn-animated animate__animated">
                    <i class="fas fa-bone fa-3x mb-2"></i>
                    <h5>Salud Óseo-Articular</h5>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="#" class="btn btn-animated animate__animated">
                    <i class="fas fa-venus-mars fas fa-dna fa-3x mb-2"></i>
                    <h5>Urogenital</h5>
                </a>
            </div>

        </div>
    </div>


<!-- Productos por Categorías -->
<div class="container-xxl py-5 fadeIn" id="colagenos">
    <div class="container">
        <div class="accordion" id="productAccordion">
            <!-- Categoría 1: Colagenos -->
            <div class="accordion-item">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Botón de Retroceso con Ícono -->
                    <button class="btn btn-primary" onclick="goBack()">
                        <i class="fas fa-arrow-left me-2"></i> Volver
                    </button>
                </div>

                <h2 class="accordion-header" id="headingOne">

                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Colegenos
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#productAccordion">
                    <div class="accordion-body">
                        <!-- Producto 1 -->
                        <div class="row">
                            <div class="col-lg-4">
                                <h5>Bella</h5>
                                <p>La única fórmula diseñada para desafiar la edad de toda tu piel.</p>
                            </div>
                            <div class="col-lg-4">
                                <img src="img/productos/foto010.png" class="img-fluid" alt="Bella">
                            </div>
                            <div class="col-lg-4">
                                

                                <!-- Detalles del Producto en Acordeones -->
                                <div class="accordion" id="accordionProduct1Details">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingComposition1">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#composition1" aria-expanded="false" aria-controls="composition1">
                                                Composición
                                            </button>
                                        </h2>
                                        <div id="composition1" class="accordion-collapse collapse" aria-labelledby="headingComposition1" data-bs-parent="#accordionProduct1Details">
                                            <div class="accordion-body">
                                                Colágeno Hidrolizado, Ácido Hialurónico, etc.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingAdministration1">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#administration1" aria-expanded="false" aria-controls="administration1">
                                                Administración
                                            </button>
                                        </h2>
                                        <div id="administration1" class="accordion-collapse collapse" aria-labelledby="headingAdministration1" data-bs-parent="#accordionProduct1Details">
                                            <div class="accordion-body">
                                                Oral, 1 cápsula diaria.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingDose1">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dose1" aria-expanded="false" aria-controls="dose1">
                                                Dosis
                                            </button>
                                        </h2>
                                        <div id="dose1" class="accordion-collapse collapse" aria-labelledby="headingDose1" data-bs-parent="#accordionProduct1Details">
                                            <div class="accordion-body">
                                                500mg por cápsula.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingContraindications1">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contraindications1" aria-expanded="false" aria-controls="contraindications1">
                                                Contraindicaciones y Advertencias
                                            </button>
                                        </h2>
                                        <div id="contraindications1" class="accordion-collapse collapse" aria-labelledby="headingContraindications1" data-bs-parent="#accordionProduct1Details">
                                            <div class="accordion-body">
                                                No recomendado para personas con alergia al colágeno.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingPresentation1">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#presentation1" aria-expanded="false" aria-controls="presentation1">
                                                Presentación
                                            </button>
                                        </h2>
                                        <div id="presentation1" class="accordion-collapse collapse" aria-labelledby="headingPresentation1" data-bs-parent="#accordionProduct1Details">
                                            <div class="accordion-body">
                                                Caja de 30 cápsulas.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Producto 2 -->
                        <div class="row">
                            <div class="col-lg-4">
                                <h5>HIDROVITAL</h5>
                                <p>100% Colágeno Hidrolizado.</p>
                            </div>
                            <div class="col-lg-4">
                                <img src="img/productos/foto011.png" class="img-fluid" alt="HIDROVITAL">
                            </div>
                            <div class="col-lg-4">
                                

                                <!-- Detalles del Producto en Acordeones -->
                                <div class="accordion" id="accordionProduct2Details">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingComposition2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#composition2" aria-expanded="false" aria-controls="composition2">
                                                Composición
                                            </button>
                                        </h2>
                                        <div id="composition2" class="accordion-collapse collapse" aria-labelledby="headingComposition2" data-bs-parent="#accordionProduct2Details">
                                            <div class="accordion-body">
                                                100% Colágeno Hidrolizado en Polvo.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingAdministration2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#administration2" aria-expanded="false" aria-controls="administration2">
                                                Administración
                                            </button>
                                        </h2>
                                        <div id="administration2" class="accordion-collapse collapse" aria-labelledby="headingAdministration2" data-bs-parent="#accordionProduct2Details">
                                            <div class="accordion-body">
                                                Disolver en agua o jugo.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingDose2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dose2" aria-expanded="false" aria-controls="dose2">
                                                Dosis
                                            </button>
                                        </h2>
                                        <div id="dose2" class="accordion-collapse collapse" aria-labelledby="headingDose2" data-bs-parent="#accordionProduct2Details">
                                            <div class="accordion-body">
                                                10g por toma diaria.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingContraindications2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contraindications2" aria-expanded="false" aria-controls="contraindications2">
                                                Contraindicaciones y Advertencias
                                            </button>
                                        </h2>
                                        <div id="contraindications2" class="accordion-collapse collapse" aria-labelledby="headingContraindications2" data-bs-parent="#accordionProduct2Details">
                                            <div class="accordion-body">
                                                No recomendado para personas con alergias a proteínas.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingPresentation2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#presentation2" aria-expanded="false" aria-controls="presentation2">
                                                Presentación
                                            </button>
                                        </h2>
                                        <div id="presentation2" class="accordion-collapse collapse" aria-labelledby="headingPresentation2" data-bs-parent="#accordionProduct2Details">
                                            <div class="accordion-body">
                                                Bote de 300g.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
   function showProducts(categoryId, event) {
        event.preventDefault(); // Previene el comportamiento por defecto del enlace
        $("#" + categoryId)
        .show('slide')

        $("#categorias").fadeOut(300); // Oculta las categorías con efecto fade
    }

    function goBack() {
        $("#colagenos").fadeOut(300); // Oculta la sección actual con efecto fade
        $("#categorias").fadeIn(300); // Muestra las categorías
    }

</script>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>
