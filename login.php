<?php
session_start();
$conn = new mysqli("localhost", "root", "", "tecnicos_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hash);

    if ($stmt->num_rows > 0 && password_verify($password, $hash)) {
        $_SESSION["usuario_id"] = $id;
        header("Location: area_tecnica.php");
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>
