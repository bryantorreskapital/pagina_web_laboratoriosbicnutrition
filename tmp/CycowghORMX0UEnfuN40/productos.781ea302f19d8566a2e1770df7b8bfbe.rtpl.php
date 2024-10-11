<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-4 animated slideInRight">Productos</h1>
    </div>
</div>
<!-- Page Header End -->

<!-- Productos por Categorías -->
<div class="container-xxl py-5 fadeIn">
    <div class="container">
        <div class="accordion" id="productAccordion">
            <!-- Categoría 1: Suplementos -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Suplementos
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

            <!-- Categoría 2: Otros -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Otros
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#productAccordion">
                    <div class="accordion-body">
                        <!-- Más productos aquí -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>
