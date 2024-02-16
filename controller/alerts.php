<?php

if (isset($_SESSION['add-note'])) {
    unset($_SESSION['add-note']);

    echo "<script>";
    echo "Swal.fire({
        icon: 'success',
        title: 'Nota agregada con exito.',
        showConfirmButton: false,
        timer: 1200
    });";
    echo "</script>";
}else if(isset($_SESSION['update-note'])){
    unset($_SESSION['update-note']);

    echo "<script>";
    echo "Swal.fire({
        icon: 'success',
        title: 'Nota actualizada con exito.',
        showConfirmButton: false,
        timer: 1200
    });";
    echo "</script>";
} else if(isset($_SESSION['delete-note'])){
    unset($_SESSION['delete-note']);
    echo "<script>";
    echo "Swal.fire({
        icon: 'success',
        title: 'Nota eliminada con exito.',
        showConfirmButton: false,
        timer: 1200
    });";
    echo "</script>";
}