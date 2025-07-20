<?php
session_start();
include 'conexion.php';
if ($_SESSION['tipo_cuenta'] != 'medico') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM medicos WHERE idMedico = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$medicos = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Medico</title>
    <link rel="icon" type="image/x-icon" href=img/icon.png>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <a href="perfil.php" id="profileLink" class="nav-item nav-link">Mi Perfil</a>
                <a href="#" id="authButton" class="nav-item nav-link">Iniciar Sesión</a>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 text-center">
                <div class="profile-img">
                    <img src="<?php echo $paciente['foto_perfil'] ?? 'img/default-profile.png'; ?>" alt="Foto de Perfil" class="rounded-circle img-fluid" id="profile-img">
                    <form action="upload_pfp.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="profile_img" class="form-control mt-3" required>
                        
                    </form>
                </div>
                <div class="personal-info mt-4">
                    <h3><?php echo $medicos['nombreMedico']; ?></h3>
                    <p><strong>Cedula:</strong> <?php echo $medicos['cedula']; ?></p>
                    <p><strong>Especialidad:</strong> <?php echo $medicos['especialidad']; ?></p>
                    
                </div>
            </div>
            <div class="col-lg-8">
                <div class="appointments mb-5">
                    <h3>Citas Programadas</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Paciente</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT citas.idCita, citas.fecha, citas.hora, pacientes.nombrePaciente, medicos.nombreMedico, medicos.especialidad, citas.estado FROM citas JOIN medicos ON citas.idMedico = medicos.idMedico JOIN pacientes ON citas.idPaciente = pacientes.idPacientes WHERE citas.idMedico = ? AND citas.estado = 'En Espera'";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $user_id);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($cita = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $cita['fecha'] . "</td>";
                                echo "<td>" . $cita['hora'] . "</td>";
                                echo "<td>" . $cita['nombrePaciente'] . "</td>";
                                echo "<td>";
                                echo "<a href='citaspdf.php?id=" . $cita['idCita'] . "' class='btn btn-sm btn-danger'><i class='fas fa-file-pdf'></i></a> ";
                                echo "<a href='editar_cita.php?id=" . $cita['idCita'] . "' class='btn btn-sm btn-warning'><i class='fas fa-pencil-alt'></i></a> ";
                                echo "<a href='#' onclick='confirmCancel(" . $cita['idCita'] . ")' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></a>   ";
                                echo "<a href='completar_cita.php?id=" . $cita['idCita'] . "' class='btn btn-sm btn-success'><i class='fas fa-check'></i></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="appointments mb-5">
                    <h3>Citas Canceladas</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Paciente</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT citas.idCita, citas.fecha, citas.hora, pacientes.nombrePaciente, medicos.nombreMedico, medicos.especialidad, citas.estado FROM citas JOIN medicos ON citas.idMedico = medicos.idMedico JOIN pacientes ON citas.idPaciente = pacientes.idPacientes WHERE citas.idMedico = ? AND citas.estado = 'Cancelada'";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $user_id);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($cita = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $cita['fecha'] . "</td>";
                                echo "<td>" . $cita['hora'] . "</td>";
                                echo "<td>" . $cita['nombrePaciente'] . "</td>";
                                echo "<td>";
                                echo "<a href='citaspdf.php?id=" . $cita['idCita'] . "' class='btn btn-sm btn-danger'><i class='fas fa-file-pdf'></i></a> ";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="appointments mb-5">
                    <h3>Citas Pasadas</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Paciente</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT citas.idCita, citas.fecha, citas.hora, pacientes.nombrePaciente, medicos.nombreMedico, medicos.especialidad, citas.estado FROM citas JOIN medicos ON citas.idMedico = medicos.idMedico JOIN pacientes ON citas.idPaciente = pacientes.idPacientes WHERE citas.idMedico = ? AND citas.estado = 'Completada'";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $user_id);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($cita = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $cita['fecha'] . "</td>";
                                echo "<td>" . $cita['hora'] . "</td>";
                                echo "<td>" . $cita['nombrePaciente'] . "</td>";
                                echo "<td>";
                                echo "<a href='citaspdf.php?id=" . $cita['idCita'] . "' class='btn btn-sm btn-danger'><i class='fas fa-file-pdf'></i></a> ";
                                
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div></div>
    
    <script src="js/script.js"></script>
    <script>
    function confirmCancel(idCita) {
        if (confirm("¿Estás seguro de que quieres cancelar esta cita?")) {
            window.location.href = 'eliminar_cita.php?id=' + idCita;
        }
    }
</script>
</body>
<br><br><br><br><br>
<footer>
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
</footer>
</html>