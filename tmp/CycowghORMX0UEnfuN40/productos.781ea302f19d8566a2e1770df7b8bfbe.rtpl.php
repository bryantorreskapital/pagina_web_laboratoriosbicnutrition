<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>
	<!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Productos</h1>
            <!--<nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>-->
        </div>
    </div>
    <!-- Page Header End -->

	<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Productos</p>
                <h4 class="display-15 mb-4">Compromiso con la Calidad: Suplementos Certificados para Tu Bienestar</h4>
                <p class="mb-4">En BIC Nutrition, ofrecemos suplementos de la más alta calidad, desarrollados bajo estrictos estándares de producción en una planta certificada que cuenta con todos los permisos sanitarios requeridos. Cada uno de nuestros productos está avalado por notificaciones sanitarias vigentes y respaldado por rigurosos estudios científicos que garantizan la eficacia y seguridad de sus componentes. Nos comprometemos a proporcionar soluciones nutricionales confiables, diseñadas para satisfacer las necesidades de nuestros clientes y contribuir a su bienestar integral.</p>
            </div>
        </div>
        
        <div class="row">
            <!-- Producto 1: BELLA -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card" onclick="showDetails('detalle1')">
                    <img src="img/productos/foto010.png" class="card-img-top" alt="Bella">
                    <div class="card-body">
                        <h5 class="card-title">Bella</h5>
                        <p class="card-text">La única fórmula diseñada para desafiar la edad de toda tu piel.</p>
                    </div>
                </div>
                <div id="detalle1" class="product-detail" style="display: none;">
                    <p><strong>Información Detallada:</strong></p>
                    <p><strong>Composición:</strong> Colágeno Hidrolizado, Ácido Hialurónico, Coenzima Q10, Vitamina C</p>
                    <p><strong>Administración y Dosis:</strong> Administración por vía oral, Tomar 1 sobre (10g) al día</p>
                    <p><strong>Contraindicaciones y advertencias:</strong> Hipersensibilidad a los componentes de la fórmula, Manténgase alejado de los niños</p>
                    <p><strong>Presentación:</strong> Caja por 30 sobres de 10g c/u</p>
                </div>
            </div>

            <!-- Producto 2: HIDROVITAL -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card" onclick="showDetails('detalle2')">
                    <img src="img/productos/foto011.png" class="card-img-top" alt="HIDROVITAL">
                    <div class="card-body">
                        <h5 class="card-title">HIDROVITAL</h5>
                        <p class="card-text">100% Colágeno Hidrolizado.</p>
                    </div>
                </div>
                <div id="detalle2" class="product-detail" style="display: none;">
                    <p><strong>Información Detallada:</strong></p>
                    <p><strong>Composición:</strong> 100% Colágeno Hidrolizado en Polvo</p>
                    <p><strong>Administración y Dosis:</strong> Administración por vía oral, Tomar 1 sobre (10g) al día</p>
                    <p><strong>Contraindicaciones y advertencias:</strong> Hipersensibilidad a los componentes de la fórmula, Manténgase alejado de los niños</p>
                    <p><strong>Presentación:</strong> Caja por 30 sobres de 10g c/u</p>
                </div>
            </div>

            <!-- Producto 3: ULTRAQC FORTE -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card" onclick="showDetails('detalle3')">
                    <img src="img/productos/foto012.png" class="card-img-top" alt="ULTRAQC FORTE">
                    <div class="card-body">
                        <h5 class="card-title">ULTRAQC FORTE</h5>
                        <p class="card-text">Hepatoprotector.</p>
                    </div>
                </div>
                <div id="detalle3" class="product-detail" style="display: none;">
                    <p><strong>Información Detallada:</strong></p>
                    <p><strong>Composición:</strong> Silimarina, Cúrcuma, Coenzima Q10, Complejo B</p>
                    <p><strong>Administración y Dosis:</strong> Administración por vía oral, Tomar 2 cápsulas (1g) al día</p>
                    <p><strong>Contraindicaciones y advertencias:</strong> Hipersensibilidad a los componentes de la fórmula, Manténgase alejado de los niños</p>
                    <p><strong>Presentación:</strong> Caja por 40 cápsulas de 500mg c/u</p>
                </div>
            </div>

            <!-- Producto 4: HIDROFLEX ADVANCE -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card" onclick="showDetails('detalle4')">
                    <img src="img/productos/foto013.png" class="card-img-top" alt="HIDROFLEX ADVANCE">
                    <div class="card-body">
                        <h5 class="card-title">HIDROFLEX ADVANCE</h5>
                        <p class="card-text">Movilidad y Flexibilidad: a base de Glucosamina.</p>
                    </div>
                </div>
                <div id="detalle4" class="product-detail" style="display: none;">
                    <p><strong>Información Detallada:</strong></p>
                    <p><strong>Composición:</strong> Glucosamina, Cúrcuma, Maca Negra, Pimienta Negra</p>
                    <p><strong>Administración y Dosis:</strong> Administración por vía oral, Tomar 3 cápsulas (1.5g) al día</p>
                    <p><strong>Contraindicaciones y advertencias:</strong> Hipersensibilidad a los componentes de la fórmula, Manténgase alejado de los niños</p>
                    <p><strong>Presentación:</strong> Caja por 80 cápsulas de 500mg c/u</p>
                </div>
            </div>

            <!-- Producto 5: Maca Negra -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card" onclick="showDetails('detalle5')">
                    <img src="img/productos/foto014.png" class="card-img-top" alt="Maca Negra">
                    <div class="card-body">
                        <h5 class="card-title">Maca Negra</h5>
                        <p class="card-text">Extracto de Maca Negra.</p>
                    </div>
                </div>
                <div id="detalle5" class="product-detail" style="display: none;">
                    <p><strong>Información Detallada:</strong></p>
                    <p><strong>Composición:</strong> 100% extracto de raíz de maca negra en polvo</p>
                    <p><strong>Administración y Dosis:</strong> Administración por vía oral, Tomar 2 cápsulas (1g) al día</p>
                    <p><strong>Contraindicaciones y advertencias:</strong> Hipersensibilidad a los componentes de la fórmula, Manténgase alejado de los niños</p>
                    <p><strong>Presentación:</strong> Caja por 40 cápsulas de 500mg c/u</p>
                </div>
            </div>

            <!-- Producto 6: FÓRMULA 69 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card" onclick="showDetails('detalle6')">
                    <img src="img/productos/foto015.png" class="card-img-top" alt="FÓRMULA 69">
                    <div class="card-body">
                        <h5 class="card-title">FÓRMULA 69</h5>
                        <p class="card-text">Afrodisíaco natural.</p>
                    </div>
                </div>
                <div id="detalle6" class="product-detail" style="display: none;">
                    <p><strong>Información Detallada:</strong></p>
                    <p><strong>Composición:</strong> Maca Negra, Mashua, Zinc, Vitamina C</p>
                    <p><strong>Administración y Dosis:</strong> Administración por vía oral, Tomar 1 cápsula (500mg) al día</p>
                    <p><strong>Contraindicaciones y advertencias:</strong> Hipersensibilidad a los componentes de la fórmula, Manténgase alejado de los niños</p>
                    <p><strong>Presentación:</strong> Caja por 30 cápsulas de 500mg c/u</p>
                </div>
            </div>

            <!-- Producto 7: BCCAA 2:1:1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card" onclick="showDetails('detalle7')">
                    <img src="img/productos/foto016.png" class="card-img-top" alt="BCCAA 2:1:1">
                    <div class="card-body">
                        <h5 class="card-title">BCCAA 2:1:1</h5>
                        <p class="card-text">Amonoácidos Esenciales.</p>
                    </div>
                </div>
                <div id="detalle7" class="product-detail" style="display: none;">
                    <p><strong>Información Detallada:</strong></p>
                    <p><strong>Composición:</strong> Leucina, Valina, Isoleucina, Lecitina</p>
                    <p><strong>Administración y Dosis:</strong> Administración por vía oral Tomar 1 sobre (10g) al día</p>
                    <p><strong>Contraindicaciones y advertencias:</strong> Hipersensibilidad a los componentes de la fórmula Manténgase alejado de los niños</p>
                    <p><strong>Presentación:</strong> Caja por 30 cápsulas de 6g c/u</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<script>
    function showDetails(id) {
        var details = document.querySelectorAll('.product-detail');
        details.forEach(function(detail) {
            detail.style.display = 'none'; // Oculta todos los detalles
        });
        var selectedDetail = document.getElementById(id);
        if (selectedDetail.style.display === 'none') {
            selectedDetail.style.display = 'block'; // Muestra el detalle seleccionado
        } else {
            selectedDetail.style.display = 'none'; // Oculta si ya estaba visible
        }
    }
</script>



<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>