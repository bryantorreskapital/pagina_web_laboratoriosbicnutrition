<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>

	<!-- Soluciones Start -->
    <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Soluciones</p>
                <h1 class="display-5 mb-5">Soluciones Epecializadas Para Cada Tipo De Empresa</h1>
            </div>
            <div class="row g-8 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-1 active"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Kapital Comercial</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-1"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Kapital Clinicas</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-1"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Kapital Producción</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-1"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Kapital Restaurantes</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-1"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Kapital Compañias de Transporte</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-1"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-6" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Kapital Talleres</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-1"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-7" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Kapital Veterinarias</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-1"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-8" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Kapital Funerarias</h5>
                        </button>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100" src="img/service-1.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">Solución Comercial</h3>
                                    <p class="mb-4" align="justify">La gestión efectiva de los procesos comerciales es esencial para el éxito de cualquier empresa. En este módulo del ERP, nos enfocamos en brindar soluciones integrales que permitan a nuestros clientes llevar un control preciso de sus operaciones de ventas, desde la gestión de clientes y proveedores hasta la realización de pedidos y facturación. Con nuestro módulo comercial, podrá optimizar su tiempo y esfuerzo, mejorar la eficiencia de sus operaciones y tomar decisiones oportunas para impulsar su crecimiento. ¡Descubra cómo nuestro módulo comercial puede transformar su empresa hoy mismo!.</p>
                                    <a href="documentos/PRESENTACION_KAPITAL_COMERCiAL.pdf" target="_blank" class="btn btn-primary py-3 px-5 mt-3">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100" src="img/service-2.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">Solución Clinicas</h3>
                                    <p class="mb-4" align="justify">Bienvenidos al módulo clínicas del ERP, la solución integral para la gestión de clínicas y centros médicos. Con este módulo, podrás automatizar todas las operaciones y procesos clínicos de manera eficiente y precisa, mejorando la calidad de atención y la satisfacción de tus pacientes. Desde la gestión de citas y la historia clínica electrónica hasta la gestión de facturación y pagos, este módulo es el complemento perfecto para que tu clínica funcione de manera óptima. ¡Comienza a aprovechar todas sus características y mejora la gestión de tu clínica hoy mismo!.</p>
                                    <a href="documentos/PRESENTACION_KAPITAL_CLINICAS.pdf" target="_blank" class="btn btn-primary py-3 px-5 mt-3">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100" src="img/service-3.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">Solución Producción</h3>
                                    <p class="mb-4" align="justify">El módulo de producción del ERP es esencial para cualquier empresa que se dedique a la fabricación o elaboración de bienes o productos. Este módulo permite a las empresas tener un control completo y preciso de sus procesos, desde la planificación hasta la entrega final del producto. Con el módulo de producción, las empresas pueden optimizar sus procesos, mejorar la eficiencia y reducir los costos, lo que se traduce en una mayor rentabilidad y una mejor gestión del negocio. ¡Descubre cómo el módulo de producción del ERP puede transformar tu empresa y mejorar tus procesos hoy mismo!</p>
                                    <a href="documentos/PRESENTACION_KAPITAL_PRODUCCION.pdf" target="_blank" class="btn btn-primary py-3 px-5 mt-3">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100" src="img/service-4.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <h3 class="mb-4">Solución Restaurantes</h3>
                                    <p class="mb-4" align="justify">El módulo de restaurantes de nuestro sistema ERP está diseñado específicamente para satisfacer las necesidades y desafíos únicos que enfrentan los restaurantes en la gestión de su día a día. Con su interfaz intuitiva y fácil de usar, este módulo permite a los gerentes de restaurantes tener una visión completa y en tiempo real de sus operaciones, desde la gestión de inventario, la planificación de mesas, el control de ordenes de pedido en cocina y  facturación. Al automatizar y optimizar estos procesos, los restaurantes pueden aumentar la eficiencia y mejorar la satisfacción del cliente. ¡Descubre cómo nuestro módulo de restaurantes puede ayudar a tu negocio a alcanzar su máximo potencial!.</p>
                                    <a href="documentos/PRESENTACION_KAPITAL_RESTAURANTES.pdf" target="_blank" class="btn btn-primary py-3 px-5 mt-3">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-5">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100" src="img/service-4.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">Solución Compañias Transporte</h3>
                                    <p class="mb-4" align="justify">El módulo para compañías de transporte del ERP está diseñado específicamente para atender las necesidades y desafíos únicos de las compañías de transporte. Con su tecnología avanzada y funciones específicas, este módulo permite a las compañías de transporte llevar un control eficaz de todas sus operaciones, desde la planificación y asignación de rutas hasta la gestión de recursos y la contabilidad. Con el módulo para compañías de transporte del ERP, las compañías pueden maximizar su eficiencia y mejorar su rentabilidad, todo en tiempo real.</p>
                                    <a href="documentos/PRESENTACION_KAPITAL_COMPAÑIA_DE_TRANSPORTE.pdf" target="_blank" class="btn btn-primary py-3 px-5 mt-3">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-6">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100" src="img/service-4.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">Solución Talleres</h3>
                                    <p class="mb-4" align="justify">El módulo de talleres del ERP es una solución integral para la gestión de servicios. Con este módulo, las empresas pueden controlar y optimizar sus operaciones, desde el ingreso de un vehículo o un producto, realizar un presupuesto, solicitar un respuesto, asignar a un trabajador y facturar. Además, el módulo ofrece una visibilidad en tiempo real sobre el estado de los inventarios y la capacidad de realizar pedidos y seguimientos en línea. ¡Optimice su gestión de repuestos y mejore la eficiencia de su negocio con el módulo de repuestos del ERP!.</p>
                                    <a href="documentos/PRESENTACION_KAPITAL_REPUESTOS.pdf" target="_blank" class="btn btn-primary py-3 px-5 mt-3">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-7">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100" src="img/service-4.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">Solución Veterinarias</h3>
                                    <p class="mb-4" align="justify">Bienvenido al módulo veterinarias de nuestro sistema ERP. Este módulo está diseñado específicamente para atender a las necesidades únicas de las mascotas de tus clientes. Con él, podrás llevar un control preciso de tus pacientes, citas y tratamientos médicos, así como también de tus inventarios de medicamentos y suministros. Además, podrás automatizar tus procesos de facturación y cobros, lo que te permitirá ahorrar tiempo y aumentar la eficiencia en tu negocio. Con este módulo, podrás centrarte en lo que realmente importa: cuidar a tus pacientes y mejorar la atención que brindas a tus clientes.</p>
                                    <a href="documentos/PRESENTACION_KAPITAL_VETERINARIAS.pdf" target="_blank" class="btn btn-primary py-3 px-5 mt-3">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-8">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100" src="img/service-4.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">Solución Funerarias</h3>
                                    <p class="mb-4" align="justify">El modulo funerarias del ERP está diseñado específicamente para las empresas funerarias que buscan optimizar y automatizar sus procesos. Con un enfoque en la eficiencia y la organización, el modulo funerarias ofrece herramientas avanzadas para la gestión de servicios, inventarios, facturación y seguimiento de clientes. Además, permite una mejor coordinación entre departamentos y una mayor transparencia en la toma de decisiones. Este modulo está diseñado para ayudar a las funerarias a ser más competitivas y a mejorar la experiencia del cliente.</p>
                                    <a href="documentos/PRESENTACION_KAPITAL_FUNERARIAS.pdf" target="_blank" class="btn btn-primary py-3 px-5 mt-3">Leer Más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Soluciones End -->

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>