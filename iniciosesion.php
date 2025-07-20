<?php 
session_start();
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
unset($_SESSION['error_message']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
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
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="perfil.php" class="nav-item nav-link">Mi Perfil</a>
                <a href="#" id="authButton" class="nav-item nav-link">Iniciar Sesión</a>
            </div>
            <a href="agendar_cita.php" class="btnagendar">Agendar Cita <i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <div class="login-container">
        <form action="login.php" method="POST">
            <h2>Inicio de Sesión</h2>
            <?php if ($error_message): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>
            <label for="contra">Contraseña:</label>
            <input type="password" id="contra" name="contra" required>
            <h3>¿No tienes una cuenta? <a href="registroform.php">Regístrate aquí.</a></h3>
            <button class="button" type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>