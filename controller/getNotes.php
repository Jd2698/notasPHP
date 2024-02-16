<?php
require 'conexion.php';

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

foreach ($_SESSION['notas'] as $item) {

    $color = ($item['prioridad'] == 1) ? "color-1" : "color-2";
    $orden = ($item['prioridad'] == 1) ? "77" : "99";

    $acciones = ($_SESSION['rol_id'] == 1) ? true : false;

    echo "
    <section id='note-{$item['id']}' class='container__nota $color w-[200px] h-[200px] overflow-hidden rounded-xl order-[$orden]'>";
    if ($acciones) {
        echo "
        <div class='h-1/4 $color p-2 flex flex-row-reverse items-center gap-4'>
            <a href='controller/notasController.php?opc=2&id={$item['id']}' class='btn-delete w-[25px] h-[25px] bg-[#faa] rounded-xl'></a>
            
            <button note='{$item['id']}' class='btn-update-note w-[25px] h-[25px] bg-[#afa] rounded-xl'></button>
        </div>";
    }
    echo "
        <div class='p-2 h-3/4'>
            <textarea readonly class='note-text w-full h-full resize-none $color outline-none'>{$item['texto']}</textarea>
        </div>
        <span class='prioridad hidden'>{$item['prioridad']}</span>
    </section>
    ";
}
