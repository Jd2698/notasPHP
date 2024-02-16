<?php
require '../conexion.php';

if ($_POST) {
    session_start();

    $name = mysqli_real_escape_string($conexion , $_POST['name']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);

    $res = $conexion->query("SELECT * FROM users WHERE name='$name' and password='$password'");

    if ($res->num_rows > 0) {
        $data = $res->fetch_assoc();
        $_SESSION['state'] = 1;

        $_SESSION['name'] = strtoupper($data['name']);
        $_SESSION['id'] = $data['Id'];
        $_SESSION['rol_id'] = $data['role_id'];
        
        header('Location: notasController.php');
    } else {
        $_SESSION['login-error'] = true;
        header('Location: ../index.php');
    }
}
