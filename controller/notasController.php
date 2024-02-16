<?php
session_start();
require '../conexion.php';

if ($_POST && $_GET['opc'] && $_GET['opc'] == 1) {
    addNota();
} else if ($_GET['opc'] && $_GET['opc'] == 2 && $_GET['id']) {
    deleteNota($_GET['id']);
} else if ($_GET['opc'] && $_GET['opc'] == 3) {
    updateNota();
} else {
    getNotas();
}

function getNotas()
{
    unset($_SESSION['notas']);

    global $conexion;

    if ($_SESSION['rol_id'] == 1)
        $sql = "SELECT * FROM notas";
    else
        $sql = "SELECT * FROM notas WHERE usuario_id = " . $_SESSION['id'];

    $notas = $conexion->query($sql);

    $data = array();

    if ($notas->num_rows) {
        while ($nota = $notas->fetch_assoc()) {
            $data[] = array(
                'id' => $nota['id'],
                'prioridad' => $nota['prioridad'],
                'texto' => $nota['texto']
            );
        }
    }

    $_SESSION['notas'] = $data;

    header('Location: ../notas.php');
}

function addNota()
{
    global $conexion;

    $id = $_SESSION['id'];
    $texto = $_POST['texto'];
    $prioridad = $_POST['prioridad'];

    $res = $conexion->query("INSERT INTO notas(texto, usuario_id, prioridad) VALUES('$texto', '$id', '$prioridad')");

    if ($res) {
        echo "true";
    } else {
        echo "false";
    }

    $_SESSION['add-note'] = true;
    getNotas();
}

function deleteNota($nota_id)
{
    global $conexion;

    if(verifyRol()){
        $res = $conexion->query("DELETE FROM notas where id = $nota_id");

        if ($res) {
            $_SESSION['delete-note'] = true;
            echo "true";
        } else {
            echo "false";
        }
    }
    getNotas();
}

function updateNota()
{
    global $conexion;

    if (verifyRol()) {
        $nota_id = $_POST['id'];
        $texto = $_POST['texto'];
        $prioridad = $_POST['prioridad'];

        $res = $conexion->query("UPDATE notas set texto = '$texto', prioridad = $prioridad WHERE id = $nota_id");

        if ($res) {
            $_SESSION['update-note'] = true;
            getNotas();
        } else {
            echo "Hubo un error en la cosulta update";
        }
    }else{
        getNotas();
    }
}

function verifyRol(){
    
    if($_SESSION['rol_id'] == 1){
        return true;
    }else{
        return false;
    }
}