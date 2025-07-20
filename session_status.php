<?php
session_start();
header('Content-Type: application/json');

$response = array('isLoggedIn' => false);

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    $response['isLoggedIn'] = true;
}

echo json_encode($response);
?>
