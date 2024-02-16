<?php
require '../conexion.php';

if ($_POST) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $res = $conexion->query("INSERT INTO users(name, password) VALUES('$name','$password')");

    print_r($res);
}
