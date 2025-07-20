<?php
include 'conexion.php';

$query = "SELECT COUNT(*) AS count FROM medicos";
$result = $conn->query($query);
$medicos = $result->fetch_assoc()['count'];

$query = "SELECT COUNT(*) AS count FROM pacientes";
$result = $conn->query($query);
$pacientes = $result->fetch_assoc()['count'];

$query = "SELECT COUNT(*) AS count FROM citas";
$result = $conn->query($query);
$citas = $result->fetch_assoc()['count'];

echo json_encode([
    'medicos' => $medicos,
    'pacientes' => $pacientes,
    'citas' => $citas
]);
?>