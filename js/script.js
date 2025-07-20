document.addEventListener('DOMContentLoaded', function() {
    const authButton = document.getElementById('authButton');

    // Comprobar el estado de la sesión
    fetch('session_status.php')
        .then(response => response.json())
        .then(data => {
            if (data.isLoggedIn) {
                authButton.textContent = 'Cerrar Sesión';
                authButton.href = 'cerrarsesion.php';
                profileLink.href = 'perfil.php';
            } else {
                authButton.textContent = 'Iniciar Sesión';
                authButton.href = 'iniciosesion.php';
                profileLink.href = 'iniciosesion.php';
            }
        });
});
