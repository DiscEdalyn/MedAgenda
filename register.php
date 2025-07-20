<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombrePaciente = $_POST['nombrePaciente'];
    $nacimiento = $_POST['nacimiento'];
    $sexo = $_POST['sexo'];
    $sangre = $_POST['sangre'];
    $peso = $_POST['peso'];
    $estatura = $_POST['estatura'];
    $dir = $_POST['dir'];
    $correo = $_POST['correo'];
    $contra = $_POST['contra']; 
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $enfermedades = $_POST['enfermedades'];
    $alergias = $_POST['alergias'];
    $detalles = $_POST['detalles'];
    $inhabilitado = 0; 

    $query = "INSERT INTO pacientes (nombrePaciente, nacimiento, sexo, sangre, peso, estatura, dir, correo, contra, telefono, celular, enfermedades, alergias, detalles, inhabilitado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssiissssssssi", $nombrePaciente, $nacimiento, $sexo, $sangre, $peso, $estatura, $dir, $correo, $contra, $telefono, $celular, $enfermedades, $alergias, $detalles, $inhabilitado);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    if ($stmt->execute()) {
        header("Location: perfil.php");
        exit();;
    } else {
        echo "Error en el registro: " . $stmt->error;
    }
}
?>
