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
                <a href="#" class="btn btn-animated animate__animated" onclick="showProducts('hepatoprotector', event)">
                    <i class="fas fa-lungs fa-3x mb-2"></i>
                    <h5>Hepatoprotector</h5>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="#" class="btn btn-animated animate__animated" onclick="showProducts('salud-oseo-articular', event)">
                    <i class="fas fa-bone fa-3x mb-2"></i>
                    <h5>Salud Óseo-Articular</h5>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="#" class="btn btn-animated animate__animated" onclick="showProducts('urogenital', event)">
                    <i class="fas fa-venus-mars fas fa-dna fa-3x mb-2"></i>
                    <h5>Urogenital</h5>
                </a>
            </div>
            <div class="col-md-3 mb-4">
                <a href="#" class="btn btn-animated animate__animated" onclick="showProducts('gym', event)">
                    <i class="fas fa-dumbbell fa-3x mb-2"></i>
                    <h5>Gym</h5>
                </a>
            </div>

        </div>
    </div>


<!-- Productos categoria Colagenos -->
<div class="container-xxl py-5 fadeIn" id="colagenos">
    <div class="container">
        <div class="accordion" id="productColagenosAccordion">
            <!-- Categoría 1: Colagenos -->
            <div class="accordion-item">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Botón de Retroceso con Ícono -->
                    <button class="btn btn-primary" onclick="goBack('colagenos')">
                        <i class="fas fa-arrow-left me-2"></i> Categorías
                    </button>
                </div>

                <h2 class="accordion-header" id="headingOne">

                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseColagenos" aria-expanded="true" aria-controls="collapseColagenos">
                        Colegenos
                    </button>
                </h2>
                <div id="collapseColagenos" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#productColagenosAccordion">
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
                                                Colágeno Hidrolizado, Ácido Hialurónico, Coenzima Q10, Vitamina C.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingAdministration1">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#administration1" aria-expanded="false" aria-controls="administration1">
                                                Administración y Dosis
                                            </button>
                                        </h2>
                                        <div id="administration1" class="accordion-collapse collapse" aria-labelledby="headingAdministration1" data-bs-parent="#accordionProduct1Details">
                                            <div class="accordion-body">
                                                Administración por vía oral <br> Tomar 1 sobre (10g) al día
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingDose1">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dose1" aria-expanded="false" aria-controls="dose1">
                                                Contraindicaciones y advertencias
                                            </button>
                                        </h2>
                                        <div id="dose1" class="accordion-collapse collapse" aria-labelledby="headingDose1" data-bs-parent="#accordionProduct1Details">
                                            <div class="accordion-body">
                                                Hipersensibilidad a los componentes de la fórmula. <br>Manténgase alejado de los niños.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingContraindications1">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contraindications1" aria-expanded="false" aria-controls="contraindications1">
                                                Presentación
                                            </button>
                                        </h2>
                                        <div id="contraindications1" class="accordion-collapse collapse" aria-labelledby="headingContraindications1" data-bs-parent="#accordionProduct1Details">
                                            <div class="accordion-body">
                                                Caja por 30 sobres de 10g c/u
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
                                                Administración y Dosis
                                            </button>
                                        </h2>
                                        <div id="administration2" class="accordion-collapse collapse" aria-labelledby="headingAdministration2" data-bs-parent="#accordionProduct2Details">
                                            <div class="accordion-body">
                                                Administración por vía oral <br> Tomar 1 sobre (10g) al día.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingDose2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dose2" aria-expanded="false" aria-controls="dose2">
                                                Contraindicaciones y advertencias
                                            </button>
                                        </h2>
                                        <div id="dose2" class="accordion-collapse collapse" aria-labelledby="headingDose2" data-bs-parent="#accordionProduct2Details">
                                            <div class="accordion-body">
                                                Hipersensibilidad a los componentes de la fórmula. <br> Manténgase alejado de los niños.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingContraindications2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contraindications2" aria-expanded="false" aria-controls="contraindications2">
                                                Presentación
                                            </button>
                                        </h2>
                                        <div id="contraindications2" class="accordion-collapse collapse" aria-labelledby="headingContraindications2" data-bs-parent="#accordionProduct2Details">
                                            <div class="accordion-body">
                                                Caja por 30 sobres de 10g c/u.
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

<!-- Productos categoria Hepatoprotector -->
<div class="container-xxl py-5 fadeIn" id="hepatoprotector">
    <div class="container">
        <div class="accordion" id="productHepatoprotectorAccordion">
            <!-- Categoría 1: Colagenos -->
            <div class="accordion-item">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Botón de Retroceso con Ícono -->
                    <button class="btn btn-primary" onclick="goBack('hepatoprotector')">
                        <i class="fas fa-arrow-left me-2"></i> Categorías
                    </button>
                </div>

                <h2 class="accordion-header" id="headingHepatoprotector">

                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHepatoprotector" aria-expanded="true" aria-controls="collapseHepatoprotector">
                        Hepatoprotector
                    </button>
                </h2>
                <div id="collapseHepatoprotector" class="accordion-collapse collapse show" aria-labelledby="headingHepatoprotector" data-bs-parent="#productHepatoprotectorAccordion">
                    <div class="accordion-body">
                        <!-- Producto 1 -->
                        <div class="row">
                            <div class="col-lg-4">
                                <h5>ULTRAQC FORTE</h5>
                                <p>Hepatoprotector.</p>
                            </div>
                            <div class="col-lg-4">
                                <img src="img/productos/foto012.png" class="img-fluid" alt="Bella">
                            </div>
                            <div class="col-lg-4">
                                

                                <!-- Detalles del Producto en Acordeones -->
                                <div class="accordion" id="accordionProduct3Details">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingComposition2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#composition2" aria-expanded="false" aria-controls="composition2">
                                                Composición
                                            </button>
                                        </h2>
                                        <div id="composition2" class="accordion-collapse collapse" aria-labelledby="headingComposition2" data-bs-parent="#accordionProduct3Details">
                                            <div class="accordion-body">
                                                Silimarina, Cúrcuma, Coenzima Q10, Complejo B.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingAdministration2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#administration2" aria-expanded="false" aria-controls="administration2">
                                                Administración y Dosis
                                            </button>
                                        </h2>
                                        <div id="administration2" class="accordion-collapse collapse" aria-labelledby="headingAdministration2" data-bs-parent="#accordionProduct3Details">
                                            <div class="accordion-body">
                                                Administración por vía oral <br> Tomar 2 cápsulas (1g) al día
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingContraindications2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contraindications2" aria-expanded="false" aria-controls="contraindications2">
                                                Contraindicaciones y advertencias
                                            </button>
                                        </h2>
                                        <div id="contraindications2" class="accordion-collapse collapse" aria-labelledby="headingContraindications2" data-bs-parent="#accordionProduct3Details">
                                            <div class="accordion-body">
                                                Hipersensibilidad a los componentes de la fórmula <br> Manténgase alejado de los niños
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingPresentation2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#presentation2" aria-expanded="false" aria-controls="presentation2">
                                                Presentación
                                            </button>
                                        </h2>
                                        <div id="presentation2" class="accordion-collapse collapse" aria-labelledby="headingPresentation2" data-bs-parent="#accordionProduct3Details">
                                            <div class="accordion-body">
                                                Caja por 40 cápsulas de 500mg c/u
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

<!-- Productos categoria Salud Osea Articular -->
<div class="container-xxl py-5 fadeIn" id="salud-oseo-articular">
    <div class="container">
        <div class="accordion" id="productSaludOseoArticularAccordion">
            <!-- Categoría 1: Colagenos -->
            <div class="accordion-item">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Botón de Retroceso con Ícono -->
                    <button class="btn btn-primary" onclick="goBack('salud-oseo-articular')">
                        <i class="fas fa-arrow-left me-2"></i> Categorías
                    </button>
                </div>

                <h2 class="accordion-header" id="headingSaludOseoArticular">

                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSaludOseoArticular" aria-expanded="true" aria-controls="collapseSaludOseoArticular">
                        Salud Oseo Articular
                    </button>
                </h2>
                <div id="collapseSaludOseoArticular" class="accordion-collapse collapse show" aria-labelledby="headingSaludOseoArticular" data-bs-parent="#productSaludOseoArticularAccordion">
                    <div class="accordion-body">
                        <!-- Producto 1 -->
                        <div class="row">
                            <div class="col-lg-4">
                                <h5>HIDROFLEX ADVANCE</h5>
                                <p>Movilidad y Flexibilidad: a base de Glucosamina.</p>
                            </div>
                            <div class="col-lg-4">
                                <img src="img/productos/foto013.png" class="img-fluid" alt="Bella">
                            </div>
                            <div class="col-lg-4">
                                

                                <!-- Detalles del Producto en Acordeones -->
                                <div class="accordion" id="accordionProduct4Details">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingComposition2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#composition2" aria-expanded="false" aria-controls="composition2">
                                                Composición
                                            </button>
                                        </h2>
                                        <div id="composition2" class="accordion-collapse collapse" aria-labelledby="headingComposition2" data-bs-parent="#accordionProduct4Details">
                                            <div class="accordion-body">
                                                Glucosamina, Cúrcuma, Maca Negra, Pimienta Negra.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingAdministration2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#administration2" aria-expanded="false" aria-controls="administration2">
                                                Administración y Dosis
                                            </button>
                                        </h2>
                                        <div id="administration2" class="accordion-collapse collapse" aria-labelledby="headingAdministration2" data-bs-parent="#accordionProduct4Details">
                                            <div class="accordion-body">
                                                Administración por vía oral <br> Tomar 3 cápsulas (1.5g) al día
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingContraindications2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contraindications2" aria-expanded="false" aria-controls="contraindications2">
                                                Contraindicaciones y advertencias
                                            </button>
                                        </h2>
                                        <div id="contraindications2" class="accordion-collapse collapse" aria-labelledby="headingContraindications2" data-bs-parent="#accordionProduct4Details">
                                            <div class="accordion-body">
                                                Hipersensibilidad a los componentes de la fórmula <br> Manténgase alejado de los niños
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingPresentation2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#presentation2" aria-expanded="false" aria-controls="presentation2">
                                                Presentación
                                            </button>
                                        </h2>
                                        <div id="presentation2" class="accordion-collapse collapse" aria-labelledby="headingPresentation2" data-bs-parent="#accordionProduct4Details">
                                            <div class="accordion-body">
                                                Caja por 80 cápsulas de 500mg c/u
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

<!-- Productos categoria Urogenital -->
<div class="container-xxl py-5 fadeIn" id="urogenital">
    <div class="container">
        <div class="accordion" id="productUrogenitalAccordion">
            <!-- Categoría 1: Colagenos -->
            <div class="accordion-item">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Botón de Retroceso con Ícono -->
                    <button class="btn btn-primary" onclick="goBack('urogenital')">
                        <i class="fas fa-arrow-left me-2"></i> Categorías
                    </button>
                </div>

                <h2 class="accordion-header" id="headingSaludOseoArticular">

                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUrogenital" aria-expanded="true" aria-controls="collapseUrogenital">
                        Urogenital
                    </button>
                </h2>
                <div id="collapseUrogenital" class="accordion-collapse collapse show" aria-labelledby="headingSaludOseoArticular" data-bs-parent="#productUrogenitalAccordion">
                    <div class="accordion-body">
                        <!-- Producto 1 -->
                        <div class="row">
                            <div class="col-lg-4">
                                <h5>Maca Negra</h5>
                                <p>Extracto de Maca Negra.</p>
                            </div>
                            <div class="col-lg-4">
                                <img src="img/productos/foto014.png" class="img-fluid" alt="Bella">
                            </div>
                            <div class="col-lg-4">
                                

                                <!-- Detalles del Producto en Acordeones -->
                                <div class="accordion" id="accordionProduct5Details">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingComposition5">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#composition5" aria-expanded="false" aria-controls="composition5">
                                                Composición
                                            </button>
                                        </h2>
                                        <div id="composition5" class="accordion-collapse collapse" aria-labelledby="headingComposition5" data-bs-parent="#accordionProduct5Details">
                                            <div class="accordion-body">
                                                100% extracto de raíz de maca negra en polvo.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingAdministration5">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#administration5" aria-expanded="false" aria-controls="administration5">
                                                Administración y Dosis
                                            </button>
                                        </h2>
                                        <div id="administration5" class="accordion-collapse collapse" aria-labelledby="headingAdministration5" data-bs-parent="#accordionProduct5Details">
                                            <div class="accordion-body">
                                                Administración por vía oral <br> Tomar 2 cápsulas (1g) al día
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingContraindications5">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contraindications5" aria-expanded="false" aria-controls="contraindications5">
                                                Contraindicaciones y advertencias
                                            </button>
                                        </h2>
                                        <div id="contraindications5" class="accordion-collapse collapse" aria-labelledby="headingContraindications5" data-bs-parent="#accordionProduct5Details">
                                            <div class="accordion-body">
                                                Hipersensibilidad a los componentes de la fórmula <br> Manténgase alejado de los niños
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingPresentation5">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#presentation5" aria-expanded="false" aria-controls="presentation5">
                                                Presentación
                                            </button>
                                        </h2>
                                        <div id="presentation5" class="accordion-collapse collapse" aria-labelledby="headingPresentation5" data-bs-parent="#accordionProduct5Details">
                                            <div class="accordion-body">
                                                Caja por 40 cápsulas de 500mg c/u
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Producto 2 -->
                        <div class="row">
                            <div class="col-lg-4">
                                <h5>FÓRMULA 69</h5>
                                <p>Afrodisíaco natural.</p>
                            </div>
                            <div class="col-lg-4">
                                <img src="img/productos/foto015.png" class="img-fluid" alt="Bella">
                            </div>
                            <div class="col-lg-4">
                                

                                <!-- Detalles del Producto en Acordeones -->
                                <div class="accordion" id="accordionProduct6Details">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingComposition6">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#composition6" aria-expanded="false" aria-controls="composition6">
                                                Composición
                                            </button>
                                        </h2>
                                        <div id="composition6" class="accordion-collapse collapse" aria-labelledby="headingComposition6" data-bs-parent="#accordionProduct6Details">
                                            <div class="accordion-body">
                                                Maca Negra, Mashua, Zinc, Vitamina C.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingAdministration6">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#administration6" aria-expanded="false" aria-controls="administration6">
                                                Administración y Dosis
                                            </button>
                                        </h2>
                                        <div id="administration6" class="accordion-collapse collapse" aria-labelledby="headingAdministration6" data-bs-parent="#accordionProduct6Details">
                                            <div class="accordion-body">
                                                Administración por vía oral <br> Tomar 1 cápsulas (500mg) al día
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingContraindications6">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contraindications6" aria-expanded="false" aria-controls="contraindications6">
                                                Contraindicaciones y advertencias
                                            </button>
                                        </h2>
                                        <div id="contraindications6" class="accordion-collapse collapse" aria-labelledby="headingContraindications6" data-bs-parent="#accordionProduct6Details">
                                            <div class="accordion-body">
                                                Hipersensibilidad a los componentes de la fórmula <br> Manténgase alejado de los niños
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingPresentation6">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#presentation6" aria-expanded="false" aria-controls="presentation6">
                                                Presentación
                                            </button>
                                        </h2>
                                        <div id="presentation6" class="accordion-collapse collapse" aria-labelledby="headingPresentation6" data-bs-parent="#accordionProduct6Details">
                                            <div class="accordion-body">
                                                Caja por 30 cápsulas de 500mg c/u
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

<!-- Productos categoria Gym -->
<div class="container-xxl py-5 fadeIn" id="gym">
    <div class="container">
        <div class="accordion" id="productGymAccordion">
            <!-- Categoría 1: Colagenos -->
            <div class="accordion-item">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Botón de Retroceso con Ícono -->
                    <button class="btn btn-primary" onclick="goBack('gym')">
                        <i class="fas fa-arrow-left me-2"></i> Categorías
                    </button>
                </div>

                <h2 class="accordion-header" id="headingGymArticular">

                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUrogenital" aria-expanded="true" aria-controls="collapseGym">
                        GYM
                    </button>
                </h2>
                <div id="collapseGym" class="accordion-collapse collapse show" aria-labelledby="headingGymArticular" data-bs-parent="#productGymAccordion">
                    <div class="accordion-body">
                        <!-- Producto 1 -->
                        <div class="row">
                            <div class="col-lg-4">
                                <h5>BCAA 2:1:1</h5>
                                <p>Amonoácidos Esenciales.</p>
                            </div>
                            <div class="col-lg-4">
                                <img src="img/productos/foto016.png" class="img-fluid" alt="Bella">
                            </div>
                            <div class="col-lg-4">
                                

                                <!-- Detalles del Producto en Acordeones -->
                                <div class="accordion" id="accordionProduct7Details">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingComposition2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#composition2" aria-expanded="false" aria-controls="composition2">
                                                Composición
                                            </button>
                                        </h2>
                                        <div id="composition2" class="accordion-collapse collapse" aria-labelledby="headingComposition2" data-bs-parent="#accordionProduct7Details">
                                            <div class="accordion-body">
                                                Leucina, Valina, Isoleucina, Lecitina.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingAdministration2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#administration2" aria-expanded="false" aria-controls="administration2">
                                                Administración y Dosis
                                            </button>
                                        </h2>
                                        <div id="administration2" class="accordion-collapse collapse" aria-labelledby="headingAdministration2" data-bs-parent="#accordionProduct7Details">
                                            <div class="accordion-body">
                                                Administración por vía oral <br> Tomar 1 sobre (10g) al día
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingContraindications2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contraindications2" aria-expanded="false" aria-controls="contraindications2">
                                                Contraindicaciones y advertencias
                                            </button>
                                        </h2>
                                        <div id="contraindications2" class="accordion-collapse collapse" aria-labelledby="headingContraindications2" data-bs-parent="#accordionProduct7Details">
                                            <div class="accordion-body">
                                                Hipersensibilidad a los componentes de la fórmula <br> Manténgase alejado de los niños
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingPresentation2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#presentation2" aria-expanded="false" aria-controls="presentation2">
                                                Presentación
                                            </button>
                                        </h2>
                                        <div id="presentation2" class="accordion-collapse collapse" aria-labelledby="headingPresentation2" data-bs-parent="#accordionProduct7Details">
                                            <div class="accordion-body">
                                                Caja por 30 cápsulas de 6g c/u
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

    function goBack(categoryId) {
        $("#" + categoryId).fadeOut(300);
        $("#categorias").fadeIn(300); // Muestra las categorías
    }

</script>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>
