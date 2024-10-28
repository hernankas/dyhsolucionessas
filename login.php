<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Aquí debes validar el usuario y la contraseña con tu base de datos
    // Ejemplo simple:
    if ($username === "admin" && $password === "password") {
        $_SESSION['loggedin'] = true;
        header("Location: reporte_tecnico.html");
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
