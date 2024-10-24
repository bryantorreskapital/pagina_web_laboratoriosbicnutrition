<?php if(!class_exists('raintpl')){exit;}?>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white text-center footer mt-5 py-1 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-12 col-md-12">
                    <img src="img/LOGO_SECUNDARIO.png" width="150">
                    <p>
                        &copy;laboratoriosbicnutrition, All Right Reserved.
                    </p>
                    <p>
                        <a href="https://kapitalcompany.com/" class="text-white">Designed By kapitalcompany</a>
                    </p>
                </div>
            </div>
        </div>
    </div>


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