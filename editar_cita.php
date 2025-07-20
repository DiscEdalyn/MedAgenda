<?php
session_start();
include 'conexion.php';



$idCita = $_GET['id'];

$query = "SELECT * FROM citas WHERE idCita = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $idCita);
$stmt->execute();
$result = $stmt->get_result();
$cita = $result->fetch_assoc();

$query = "SELECT idMedico, nombreMedico FROM medicos";
$result_medicos = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cita</title>
    <link rel="icon" type="image/x-icon" href=img/icon.png>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Cita</h2>
        <form action="upd_appointment.php" method="POST">
            <input type="hidden" name="idCita" value="<?php echo $cita['idCita']; ?>">
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $cita['fecha']; ?>" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <select class="form-control" id="hora" name="hora" value="<?php echo $cita['hora']; ?>" required>
                <option value="09:00">09:00 AM</option>
                    <option value="09:30">09:30 AM</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="10:30">10:30 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="11:30">11:30 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="12:30">12:30 PM</option>
                    <option value="13:00">01:00 PM</option>
                    <option value="13:30">01:30 PM</option>
                    <option value="14:00">02:00 PM</option>
                    <option value="14:30">02:30 PM</option>
                    <option value="15:00">03:00 PM</option>
                    <option value="15:30">03:30 PM</option>
                    <option value="16:00">04:00 PM</option>
                    <option value="16:30">04:30 PM</option>
                    <option value="17:00">05:00 PM</option>
                    <option value="17:30">05:30 PM</option>
                    <option value="18:00">06:00 PM</option>
                    <option value="18:30">06:30 PM</option>
                    <option value="19:00">07:00 PM</option>
                    <option value="19:30">07:30 PM</option>
                    <option value="20:00">08:00 PM</option>
                    <option value="20:30">08:30 PM</option>
                </select>
            </div>
            <div class="form-group">
                <label for="idMedico">Médico:</label>
                <select class="form-control" id="idMedico" name="idMedico" required>
                    <?php while ($medico = $result_medicos->fetch_assoc()) { ?>
                        <option value="<?php echo $medico['idMedico']; ?>" <?php echo $medico['idMedico'] == $cita['idMedico'] ? 'selected' : ''; ?>>
                            <?php echo $medico['nombreMedico']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
        </form>
    </div>
    <script>
        document.getElementById('fecha').setAttribute('min', new Date().toISOString().split('T')[0]);
    </script>
</body>
</html>