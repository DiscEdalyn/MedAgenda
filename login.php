<?php
session_start();
include 'conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contra = $_POST['contra'];

    $query = "SELECT * FROM pacientes WHERE correo = ? AND contra = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $correo, $contra);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['tipo_cuenta'] = 'paciente';
        $_SESSION['user_id'] = $user['idPacientes'];
        $_SESSION['isLoggedIn'] = true; // Boton mentira :D
        header("Location: perfil_paciente.php");
        exit();
    }

    $query = "SELECT * FROM medicos WHERE correo = ? AND contra = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $correo, $contra);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['tipo_cuenta'] = 'medico';
        $_SESSION['user_id'] = $user['idMedico'];
        $_SESSION['isLoggedIn'] = true; // Boton mentira :D
        header("Location: perfil_medico.php");
        exit();
    }

    $error_message="Correo electrónico o contraseña incorrectos.";
    $_SESSION['error_message'] = $error_message;
    header("Location: iniciosesion.php");
}
?>

