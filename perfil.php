<?php
session_start();

if (!isset($_SESSION['tipo_cuenta'])) {
    header("Location: iniciosesion.php");
    exit();
}

$tipo_cuenta = $_SESSION['tipo_cuenta'];

if ($tipo_cuenta == 'medico') {
    header("Location: perfil_medico.php");
    exit();
} elseif ($tipo_cuenta == 'paciente') {
    header("Location: perfil_paciente.php");
    exit();
} else {
    echo "Tipo de cuenta no reconocido.";
}
?>