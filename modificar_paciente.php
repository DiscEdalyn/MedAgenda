<?php
session_start();
include 'conexion.php';

if ($_SESSION['tipo_cuenta'] != 'paciente') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM pacientes WHERE idPacientes = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$paciente = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil del Paciente</title>
    <link rel="icon" type="image/x-icon" href=img/icon.png>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Perfil del Paciente</h2>
        <form action="modify_paciente.php" method="POST">
            <div class="form-group">
                <label for="nombrePaciente">Nombre:</label>
                <input type="text" class="form-control" id="nombrePaciente" name="nombrePaciente" value="<?php echo $paciente['nombrePaciente']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nacimiento">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="nacimiento" name="nacimiento" value="<?php echo $paciente['nacimiento']; ?>" required>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="H" <?php if($paciente['sexo'] == 'H') echo 'selected'; ?>>Hombre</option>
                    <option value="M" <?php if($paciente['sexo'] == 'M') echo 'selected'; ?>>Mujer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sangre">Tipo de Sangre:</label>
                <select class="form-control" id="sangre" name="sangre" required>
                    <option value="A positivo (A+)" <?php if($paciente['sangre'] == 'A positivo (A+)') echo 'selected'; ?>>A positivo (A+)</option>
                    <option value="A negativo (A-)" <?php if($paciente['sangre'] == 'A negativo (A-)') echo 'selected'; ?>>A negativo (A-)</option>
                    <option value="B positivo (B+)" <?php if($paciente['sangre'] == 'B positivo (B+)') echo 'selected'; ?>>B positivo (B+)</option>
                    <option value="B negativo (B-)" <?php if($paciente['sangre'] == 'B negativo (B-)') echo 'selected'; ?>>B negativo (B-)</option>
                    <option value="AB positivo (AB+)" <?php if($paciente['sangre'] == 'AB positivo (AB+)') echo 'selected'; ?>>AB positivo (AB+)</option>
                    <option value="AB negativo (AB-)" <?php if($paciente['sangre'] == 'AB negativo (AB-)') echo 'selected'; ?>>AB negativo (AB-)</option>
                    <option value="O positivo (O+)" <?php if($paciente['sangre'] == 'O positivo (O+)') echo 'selected'; ?>>O positivo (O+)</option>
                    <option value="O negativo (O-)" <?php if($paciente['sangre'] == 'O negativo (O-)') echo 'selected'; ?>>O negativo (O-)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="peso">Peso (kg):</label>
                <input type="number" class="form-control" id="peso" name="peso" value="<?php echo $paciente['peso']; ?>" required>
            </div>
            <div class="form-group">
                <label for="estatura">Estatura (cm):</label>
                <input type="number" class="form-control" id="estatura" name="estatura" value="<?php echo $paciente['estatura']; ?>" required>
            </div>
            <div class="form-group"> 
                <label for="dir">Dirección:</label> 
                <input type="text" class="form-control" id="dir" name="dir" value="<?php echo $paciente['dir']; ?>" required> 
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $paciente['correo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $paciente['telefono']; ?>" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $paciente['celular']; ?>" required>
            </div>
            <div class="form-group">
                <label for="enfermedades">Enfermedades:</label>
                <input type="text" class="form-control" id="enfermedades" name="enfermedades" value="<?php echo $paciente['enfermedades']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alergias">Alergias:</label>
                <input type="text" class="form-control" id="alergias" name="alergias" value="<?php echo $paciente['alergias']; ?>" required>
            </div>
            <div class="form-group">
                <label for="detalles">Detalles:</label>
                <input type="text" class="form-control" id="detalles" name="detalles" value="<?php echo $paciente['detalles']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>