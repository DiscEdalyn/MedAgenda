<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $nombrePaciente = $_POST['nombrePaciente'];
    $nacimiento = $_POST['nacimiento'];
    $sexo = $_POST['sexo'];
    $sangre = $_POST['sangre'];
    $peso = $_POST['peso'];
    $estatura = $_POST['estatura'];
    $dir = $_POST['dir'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $enfermedades = $_POST['enfermedades'];
    $alergias = $_POST['alergias'];
    $detalles = $_POST['detalles'];

    $query = "UPDATE pacientes SET nombrePaciente = ?, nacimiento = ?, sexo = ?, sangre = ?, peso = ?, estatura = ?, dir = ?, correo = ?, telefono = ?, celular = ?, enfermedades = ?, alergias = ?, detalles = ? WHERE idPacientes = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssiisssssssi", $nombrePaciente, $nacimiento, $sexo, $sangre, $peso, $estatura, $dir, $correo, $telefono, $celular, $enfermedades, $alergias, $detalles, $user_id);

    if ($stmt->execute()) {
        header("Location: perfil_paciente.php");
    } else {
        echo "Error al actualizar los datos del paciente: " . $stmt->error;
    }
}
?>
