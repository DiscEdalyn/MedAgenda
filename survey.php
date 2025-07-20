<?php
session_start();
include 'conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idCita = $_POST['idCita']; 
    $idMedico = $_POST['idMedico']; 
    $atencion = $_POST['atencion'];
    $limpieza = $_POST['limpieza'];
    $efectividad = $_POST['efectividad'];
    $espera = $_POST['espera'];
    $claridad = $_POST['claridad'];

    $query = "INSERT INTO encuesta (idCita, idMedico, atencion, limpieza, efectividad, espera, claridad) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiiiiii", $idCita, $idMedico, $atencion, $limpieza, $efectividad, $espera, $claridad);

    if ($stmt->execute()) {
        header("Location: perfil_paciente.php");
        echo "Encuesta guardada exitosamente.";
    } else {
        echo "Error al guardar la encuesta: " . $stmt->error;
    }
}
?>

