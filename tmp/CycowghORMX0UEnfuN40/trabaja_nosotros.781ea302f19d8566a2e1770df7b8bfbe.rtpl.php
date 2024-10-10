<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>

	<!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Trabaja Con Nosotros</h1>
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
            <div class="col-lg-6">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Trabaja Con Nosotros</p>
                <h4 class="display-15 mb-4">Únete a BIC Nutrition: Crece con Nosotros en un Entorno de Innovación y Bienestar</h4>
                <p class="mb-4">En BIC Nutrition, buscamos personas apasionadas por la salud y el bienestar...</p>

                <form id="form-wizard" method="post">
                    <!-- Step 1 -->
                    <div class="wizard-step" id="step-1">
                        <h5>Paso 1: Información Personal</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" required placeholder="Nombre Completo">
                                    <label for="name">Nombre Completo</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cedula" required placeholder="Cédula">
                                    <label for="cedula">Cédula</label>
                                </div>
                            </div>
                            <div class="col-md-6">
							    <div class="form-floating">
							        <select class="form-select" id="cargo" required>
							            <option value="" disabled selected>Seleccione un cargo</option>
							            <option value="asistente_produccion">Asistente de Producción</option>
							            <option value="vendedor_visitador_medicos">Vendedor/Visitador a Médicos</option>
							            <option value="impulsadora">Impulsadora</option>
							        </select>
							        <label for="cargo">Cargo al que aplica</label>
							    </div>
							</div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="age" required placeholder="Edad">
                                    <label for="age">Edad</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="phone" required placeholder="Teléfono">
                                    <label for="phone">Teléfono</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="title" required placeholder="Título">
                                    <label for="title">Título</label>
                                </div>
                            </div>
                            <div class="col-md-6">
							    <div class="form-floating">
							        <select class="form-select" id="estadoCivil" required>
							            <option value="" disabled selected>Selecciona una opción</option>
							            <option value="soltero">Soltero(a)</option>
							            <option value="casado">Casado(a)</option>
							            <option value="divorciado">Divorciado(a)</option>
							            <option value="union_libre">Unión Libre</option>
							            <option value="viudo">Viudo(a)</option>
							        </select>
							        <label for="estadoCivil">Estado Civil</label>
							    </div>
							</div>
							<div class="col-md-6">
							    <div class="form-floating">
							        <select class="form-select" id="actualmenteTrabaja" required>
							            <option value="" disabled selected>Selecciona una opción</option>
							            <option value="si">Sí</option>
							            <option value="no">No</option>
							        </select>
							        <label for="actualmenteTrabaja">¿Actualmente trabaja?</label>
							    </div>
							</div>
							<div class="col-md-6">
							    <div class="form-floating">
							        <input type="number" class="form-control" id="tiempoDesempleo" required placeholder="Tiempo de desempleo actual">
							        <label for="tiempoDesempleo">¿Tiempo de desempleo actual (meses)?</label>
							    </div>
							</div>
							<div class="col-md-6">
							    <div class="form-floating">
							        <input type="text" class="form-control" id="motivoCambio" required placeholder="¿Qué le motiva a cambiar su empleo actual?">
							        <label for="motivoCambio">¿Qué le motiva a cambiar su empleo actual?</label>
							    </div>
							</div>
							<div class="col-md-6">
							    <div class="form-floating">
							        <input type="number" class="form-control" id="experienciaCargo" required placeholder="Tiempo de experiencia en el cargo (meses)">
							        <label for="experienciaCargo">Tiempo de experiencia en el cargo (meses)</label>
							    </div>
							</div>


                            <!-- Botón Siguiente -->
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="button" onclick="nextStep(2)">Siguiente</button>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="wizard-step" id="step-2" style="display: none;">
                        <h5>Paso 2: Información de empleos anteriores</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
							    <div class="form-floating">
							        <input type="text" class="form-control" id="empresa" required placeholder="Empresa">
							        <label for="empresa">Empresa:</label>
							    </div>
							</div>

							<div class="col-md-6">
							    <div class="form-floating">
							        <input type="text" class="form-control" id="cargo" required placeholder="Cargo">
							        <label for="cargo">Cargo:</label>
							    </div>
							</div>

							<div class="col-md-6">
							    <div class="form-floating">
							        <input type="text" class="form-control" id="telefono" required placeholder="Teléfono">
							        <label for="telefono">Teléfono:</label>
							    </div>
							</div>

							<div class="col-md-6">
							    <div class="form-floating">
							        <input type="text" class="form-control" id="jefeInmediato" required placeholder="Jefe inmediato">
							        <label for="jefeInmediato">Jefe inmediato:</label>
							    </div>
							</div>

							<div class="col-md-6">
							    <div class="form-floating">
							        <input type="text" class="form-control" id="tiempo" required placeholder="Tiempo">
							        <label for="tiempo">Tiempo:</label>
							    </div>
							</div>

							<div class="col-md-6">
							    <div class="form-floating">
							        <input type="number" class="form-control" id="sueldo" required placeholder="Sueldo" min="0" max="150">
							        <label for="sueldo">Sueldo:</label>
							        <small>Por favor, introduce un valor menor o igual a 150.</small>
							    </div>
							</div>

							<div class="col-12">
							    <div class="form-floating">
							        <input type="text" class="form-control" id="motivoSalida" required placeholder="Motivo de salida">
							        <label for="motivoSalida">Motivo de salida:</label>
							    </div>
							</div>

                            <!-- Botones Anterior y Siguiente -->
                            <div class="col-12 d-flex justify-content-between">
                                <button class="btn btn-secondary py-3 px-5" type="button" onclick="prevStep(1)">Anterior</button>
                                <button class="btn btn-primary py-3 px-5" type="button" onclick="nextStep(3)">Siguiente</button>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="wizard-step" id="step-3" style="display: none;">
                        <h5>Paso 3: Finalizar</h5>
                        <div class="row g-3">
                            <div class="col-md-12">
							    <div class="form-floating">
							        <input type="file" class="form-control" id="archivoPdf" accept="application/pdf" required>
							        <label for="archivoPdf">Adjuntar PDF</label>
							    </div>
							</div>

                            <!-- Botones Anterior y Enviar -->
                            <div class="col-12 d-flex justify-content-between">
                                <button class="btn btn-secondary py-3 px-5" type="button" onclick="prevStep(2)">Anterior</button>
                                <button class="btn btn-primary py-3 px-5" type="submit">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6">
                <div class="position-relative rounded overflow-hidden h-100">
                    <img src="img/portada-kp-contact.jpg" style="border-radius: 10px">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function nextStep(step) {
        // Obtener todos los campos de entrada requeridos en el paso actual
        let currentStep = document.getElementById('step-' + (step - 1));
        let requiredFields = currentStep.querySelectorAll('input[required]');
        let allFilled = true;

        // Verificar si todos los campos requeridos están llenos
        requiredFields.forEach(function (field) {
            if (!field.value.trim()) {
                allFilled = false;
                field.classList.add('is-invalid'); // Agregar clase para resaltar el campo vacío
            } else {
                field.classList.remove('is-invalid'); // Eliminar la clase si el campo está lleno
            }
        });

        // Si todos los campos están llenos, avanzar al siguiente paso
        if (allFilled) {
            // Ocultar todos los pasos
            let steps = document.querySelectorAll('.wizard-step');
            steps.forEach(function (stepDiv) {
                stepDiv.style.display = 'none';
            });

            // Mostrar el siguiente paso
            document.getElementById('step-' + step).style.display = 'block';
        } else {
            alert("Por favor, complete todos los campos requeridos."); // Mensaje de alerta
        }
    }

    function prevStep(step) {
        // Ocultar todos los pasos
        let steps = document.querySelectorAll('.wizard-step');
        steps.forEach(function (stepDiv) {
            stepDiv.style.display = 'none';
        });

        // Mostrar el paso anterior
        document.getElementById('step-' + step).style.display = 'block';
    }
</script>

   
    <!-- Contact End -->
<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>