<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Pacientes</title>
    <link rel="icon" type="image/x-icon" href=img/icon.png>
    <link rel="stylesheet" href="style.css">
</head>
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
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="perfil.php" class="nav-item nav-link">Mi Perfil</a>
                <a href="#" id="authButton" class="nav-item nav-link">Iniciar Sesión</a>
            </div>
            <a href="agendar_cita.php" class="btnagendar">Agendar Cita <i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
<body>
    <div class="register-container">
        <form class="formregistro" action="register.php" method="POST">
            <h2>Registro de Pacientes</h2>
            <label for="nombrePaciente">Nombre Completo:</label>
            <input type="text" id="nombrePaciente" name="nombrePaciente" required>
            <label for="nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="nacimiento" name="nacimiento" required>
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="H">Hombre</option>
                <option value="M">Mujer</option>
            </select>
            <label for="sangre">Tipo de Sangre:</label>
            <select id="sangre" name="sangre" required>
                <option value="A positivo (A+)">A positivo (A+)</option>
                <option value="A negativo (A-)">A negativo (A-)</option>
                <option value="B positivo (B+)">B positivo (B+)</option>
                <option value="B negativo (B-)">B negativo (B-)</option>
                <option value="AB positivo (AB+)">AB positivo (AB+)</option>
                <option value="AB negativo (AB-)">AB negativo (AB-)</option>
                <option value="O positivo (O+)">O positivo (O+)</option>
                <option value="O negativo (O-)">O negativo (O-)</option>
            </select>
            <label for="peso">Peso (kg):</label>
            <input type="number" id="peso" name="peso" required>
            <label for="estatura">Estatura (cm):</label>
            <input type="number" id="estatura" name="estatura" required>
            <label for="dir">Dirección:</label>
            <input type="text" id="dir" name="dir" required>
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>
            <label for="contra">Contraseña:</label>
            <input type="password" id="contra" name="contra" required>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" required>
            <label for="enfermedades">Enfermedades:</label>
            <input type="text" id="enfermedades" name="enfermedades" required>
            <label for="alergias">Alergias:</label>
            <input type="text" id="alergias" name="alergias" required>
            <label for="detalles">Detalles:</label>
            <input type="text" id="detalles" name="detalles" required>
            <button class="button" type="submit">Registrarse</button>
        </form>
    </div>
</body>
</html>
