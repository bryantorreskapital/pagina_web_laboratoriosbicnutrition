<?php if(!class_exists('raintpl')){exit;}?>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-4">Contáctanos</h4>
                    <p class="mb-2"><i class="fa fa-map-marker me-3"></i>Cuenca, Ecuador</p>
                    <p class="mb-2"><i class="fa fa-phone me-3"></i>+593 098 8248 665</p>
                    <p class="mb-2" translate="no"><i class="fa fa-envelope me-3"></i>laboratoriosbicnutrition@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="https://www.facebook.com/oficialkapitalcompany"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="https://instagram.com/kapital_sistema_empresarial?igshid=YmMyMTA2M2Y="><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="https://www.tiktok.com/@kapital_sistema"><i
                                class="bi bi-tiktok"></i></a>
                    </div>
                </div>
                <!--<div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Módulos</h4>
                    <a class="btn btn-link" target="_blank" href="documentos/PRESENTACION_KAPITAL_COMERCiAL.pdf">Módulo Comercial</a>
                    <a class="btn btn-link" target="_blank" href="documentos/PRESENTACION_KAPITAL_CLINICAS.pdf">Módulo Clinicas</a>
                    <a class="btn btn-link" target="_blank" href="documentos/PRESENTACION_KAPITAL_PRODUCCION.pdf">Módulo Producción</a>
                    <a class="btn btn-link" target="_blank" href="documentos/PRESENTACION_KAPITAL_RESTAURANTES.pdf">Módulo Restaurantes</a>
                    <a class="btn btn-link" target="_blank" href="documentos/PRESENTACION_KAPITAL_COMPAÑIA_DE_TRANSPORTE.pdf">Módulo Compañias Transporte</a>
                </div>-->
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Enlaces rápidos</h4>
                    <a class="btn btn-link" href="index.php?page=about">Nosotros</a>
                    <a class="btn btn-link" href="index.php?page=productos">Productos</a>
                    <a class="btn btn-link" href="index.php?page=contact">Contacto</a>
                </div>
                <div class="col-lg-5 col-md-6">
                    <h4 class="text-white mb-4">Boletín informativo</h4>
                    <p>Mantente actualizado con nuestro boletín. Recibe noticias, promociones y ofertas directo en tu bandeja de entrada. ¡Suscríbete ahora!</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-white border-0 w-100 py-3 ps-4 pe-5" id="txt-suscribirse" type="text"
                            placeholder="Correo Electrónico">
                        <button type="button" id="btn-suscribirse" 
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Suscribirse</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">laboratoriosbicnutrition</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By kapitalcompany
                </div>
                <div id="google_translate_element"></div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    

    <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
    <script src="https://formbuilder.online/assets/js/form-render.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/toastr/toastr.min.js"></script>

    <script type="text/javascript">
          /*function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'en,fr,de,pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
          }*/

        function gTranslate() {
            $('#translateModal').modal('show');
            
            var googleTranslateScript = document.createElement('script');
            googleTranslateScript.type = 'text/javascript';
            googleTranslateScript.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
            var googleTranslateElement = document.getElementById("google_translate_element");
            googleTranslateElement.innerHTML = "";

            document.body.appendChild(googleTranslateScript);
        }

        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'en,fr,de,pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }

    </script>
    <!--<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->

    <script type="text/javascript" src="<?php  echo FS_PATH;?>lib/stylinggt/stylinggt.js"></script>
    <script type="text/javascript" src="<?php  echo FS_PATH;?>lib/stylinggt/example.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#btn-suscribirse').click(function() {
        let email = $('#txt-suscribirse').val();
            $.ajax({
                type: 'POST',
                url: 'index.php?page=empresa&suscribirse=' + email,
                success: function(response) {
                    let result = response;
                    if (result.error) {
                        // Error
                        toastr.error(result.mensaje, 'error');
                    } else {
                        // Success
                        toastr.success(result.mensaje, 'success');
                    }
                }
            });
        });

        $("#form-contacto").submit(function(event) {
            event.preventDefault();
        
            var formData = {
                name: $("#name").val(),
                mail: $("#mail").val(),
                mobile: $("#mobile").val(),
                subject: $("#subject").val(),
                message: $("#message").val(),
            };

            $.ajax({
                type: "POST",
                url: "index.php?page=empresa&contacto=true",
                data: formData,
                success: function(response) {
                    let result = response;
                    if (result.error) {
                        // Error
                        toastr.error(result.mensaje, 'error');
                    } else {
                        $("#name").val('');
                        $("#mail").val('');
                        $("#mobile").val('');
                        $("#subject").val('');
                        $("#message").val('');
                        // Success
                        toastr.success(result.mensaje, 'success');
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });
</script>