<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedAgenda</title>
    <link rel="icon" type="image/x-icon" href=img/icon.png>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>
<body>
    <div class="topbar">
        <div class="left">
            <i class="fas fa-map-marker-alt"></i>
            <span>Av. Jalisco y 59, San Luis Río Colorado, SON, MX</span>
            <i class="fas fa-clock"></i>
            <span>Lun - Vie : 09:00 AM - 09:00 PM</span>
        </div>
        <div class="right">
            <i class="fas fa-phone"></i>
            <span>+653 165 0326</span>
            <a href="https://www.facebook.com/TI.UTSLRC"><i class="fab fa-facebook-f"></i></a>
            <a href="https://x.com/Tics_UTSLRC"><i class="fab fa-twitter"></i></a>
            <a href="https://mx.linkedin.com/company/universidad-tecnol%C3%B3gica-de-san-luis-r%C3%ADo-colorado"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.instagram.com/ti_utslrc/"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top p-0 wow fadeIn">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="img/logo.png" class="logo">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="perfil.php" id="profileLink" class="nav-item nav-link">Mi Perfil</a>
                <a href="#" id="authButton" class="nav-item nav-link">Iniciar Sesión</a>
            </div>
            <a href="agendar_cita.php" class="btnagendar">Agendar Cita <i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    

    <div class="container-fluid header p-0 mb-5" >
        <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-white mb-5">INNOVACIÓN CON CADA CUIDADO.</h1>
                <div class="row g-4">
                    <div class="col-sm-4">

                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1" id="medicos-count" data-toggle="counter-up">0</h2>
                            <p class="text-light mb-0">Doctores expertos</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1" id="pacientes-count" data-toggle="counter-up">0</h2>
                            <p class="text-light mb-0">Pacientes registrados</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1" id="citas-count" data-toggle="counter-up">0</h2>
                            <p class="text-light mb-0">Citas agendadas</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 mb-0">Cardiología</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 mb-0">Neurología</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="img/carousel-3.jpg" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 mb-0">Ortopedía</h1>
                        </div>
                    </div>
                </div>
                <div class="owl-nav">
                    <button type="button" role="presentation" class="owl-prev"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" role="presentation" class="owl-next"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>


    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Servicios</p>
                <h1>Soluciones para tu salúd</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-heartbeat text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Cardiología</h4>
                        <p class="mb-4">Se centra en comprender el funcionamiento de los vasos sanguíneos y del corazón, buscando manejar trastornos que los pueden afectar.</p>
                        <a class="btn" href="https://centromedicoabc.com/revista-digital/cardiologia-clinica/"><i class="fa fa-plus text-primary me-3"></i>Leer más</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-x-ray text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Neumología</h4>
                        <p class="mb-4">Especialidad médica encargada del estudio de las enfermedades del aparato respiratorio.</p>
                        <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Leer más</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-brain text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Neurología</h4>
                        <p class="mb-4">Especialidad médica que tiene competencia en el estudio del sistema nervioso.</p>
                        <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Leer más</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-wheelchair text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Ortopedia</h4>
                        <p class="mb-4">Especialidad médica que involucra el tratamiento del sistema musculoesquelético.</p>
                        <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Leer más</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-tooth text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Odontología</h4>
                        <p class="mb-4">Especialidad médica que trata, previene y estudia enfermedades típicas de la cavidad oral</p>
                        <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Leer más</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-vials text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Laboratorio</h4>
                        <p class="mb-4">En el laboratorio se obtienen y se estudian muestras biológicas diversas, como sangre, orina, heces, líquido sinovial (articulaciones), líquido cefalorraquídeo, exudados, entre otros.</p>
                        <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Leer más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Testimonios</p>
                <h1>Qué dicen nuestros pacientes!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="img/testimonial-1-1.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>Animense raza</p>
                        <h5 class="mb-1">Oskar Armenta</h5>
                        <span class="fst-italic">Alumno de UTSLRC</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="img/testimonial-2-1.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>---</p>
                        <h5 class="mb-1">Twinkie</h5>
                        <span class="fst-italic">Guardian de la casa</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="img/testimonial-3-1.jpg" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>I can breathe just fine now!</p>
                        <h5 class="mb-1">Gregory Floyd</h5>
                        <span class="fst-italic">Tax payer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid text-light footer">
        <div class="footer">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Directorio</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>       Av. Jalisco y 59, San Luis Rio Colorado, SON, MX</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>        +653 165 0326</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>     medagenda@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social rounded-circle" href="https://www.facebook.com/TI.UTSLRC"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href="https://x.com/Tics_UTSLRC"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href="https://mx.linkedin.com/company/universidad-tecnol%C3%B3gica-de-san-luis-r%C3%ADo-colorado"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href="https://www.instagram.com/ti_utslrc/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Servicios</h5>
                    <a class="btn btn-link" href="">Cardiología</a>
                    <a class="btn btn-link" href="">Nefrología</a>
                    <a class="btn btn-link" href="">Neurología</a>
                    <a class="btn btn-link" href="">Ortopedía</a>
                    <a class="btn btn-link" href="">Laboratorio</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Links</h5>
                    <a class="btn btn-link" href="">Sobre Nosotros</a>
                    <a class="btn btn-link" href="">Contactanos</a>
                    <a class="btn btn-link" href="">Nuestros servicios</a>
                    <a class="btn btn-link" href="">Términos y Condiciones</a>
                    <a class="btn btn-link" href="">Soporte</a>
                </div>
                
            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">MedAgenda</a>, Todos los derechos reservados.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Designed In <a class="border-bottom" href="https://www.utslrc.edu.mx/">UTSLRC</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="js/script.js"></script>

    <script>
    $(document).ready(function() {
        $.getJSON('counts.php', function(data) {
            $('#medicos-count').text(data.medicos).counterUp();
            $('#pacientes-count').text(data.pacientes).counterUp();
            $('#citas-count').text(data.citas).counterUp();
        });
    });
    </script>

    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                animateOut: 'fadeOut',
                nav: true,
                navText: [$('.owl-nav .owl-prev'), $('.owl-nav .owl-next')]
            });
        });
    </script>
</body>
</html>
