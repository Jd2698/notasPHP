<!DOCTYPE html>
<?php
require 'controller/state.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/notas.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Document</title>
</head>

<body class="h-screen bg-[rgb(55,58,63)] text-[20px]">

    <header class="bg-[#585858] w-screen min-h-[70px] h-[10vh] p-4 text-white flex items-center justify-between select-none fixed">
        <div class="flex items-center gap-4">
            <img src="img/loginNote.png" class="h-[7vh]" alt="">
            <h1 class="text-[1.8em]">Notas</h1>
        </div>

        <div class="flex gap-4">
            <span>
                <?php echo $_SESSION['name'] ?>
            </span>
            <span>|</span>
            <a href="controller/exitController.php" class="hover:text-[#d99]">Salir</a>
        </div>
    </header>

    <!-- formulario nueva nota -->
    <section id="container-form-new-note" class="animation-container-class hidden w-screen h-screen fixed top-0 flex justify-center items-center bg-[rgba(40,40,40,.5)] ">

        <form form-note="" action="controller/notasController.php?opc=1" method="POST" class="bg-[#fff] overflow-hidden w-[360px] max-[480px]:w-[300px]">

            <label class="block py-2 text-center bg-[#444] text-white select-none">Nueva nota</label>

            <textarea class="resize-none outline-none p-2 w-full" id="texto" name="texto" rows="7" text-note="" autofocus></textarea>

            <input class="hidden" type="hidden" name="id" value="0">
            <div class="flex gap-4 p-2 bg-[#fff]">
                <h3>Prioridad:</h3>
                <div>
                    <input id="prioridad-1" name="prioridad" type="radio" value="1"><label for="prioridad-1">1</label> <b>|</b>
                    <input id="prioridad-2" name="prioridad" type="radio" value="2"><label for="prioridad-2">2</label>
                </div>
            </div>

            <div class="flex">
                <input class="bg-[#555] text-white py-2 w-[60%]" type="submit" value="Agregar nota">
                <a href="notas.php" class="bg-[#faa] py-2 w-[40%] text-center">volver</a>
            </div>
        </form>
    </section>


    <!-- formulario editar nota -->
    <section id="container-form-update-note" class="animation-container-class hidden w-screen h-screen fixed top-0 flex justify-center items-center bg-[rgba(40,40,40,.5)] ">

        <form form-note="" action="controller/notasController.php?opc=3" method="POST" class="bg-[#fff] overflow-hidden w-[360px] max-[480px]:w-[300px]">

            <label class="block py-2 text-center bg-[#444] text-white select-none">Editar nota</label>

            <textarea class="resize-none outline-none p-2 w-full" id="texto-actualizar" text-note="" name="texto" rows="7" autofocus></textarea>

            <input id="input-form-update-id" type="hidden" name="id" value="0">
            <div class="flex gap-4 px-2">
                <h3>Prioridad:</h3>
                <div>
                    <input id="update-prioridad-1" name="prioridad" type="radio" value="1"><label for="update-prioridad-1">1</label> <b>|</b>

                    <input id="update-prioridad-2" name="prioridad" type="radio" value="2"><label for="update-prioridad-2">2</label>
                </div>
            </div>

            <div class="flex mt-4">
                <input class="bg-[#555] text-white py-2 w-[60%]" type="submit" value="Actualizar nota">
                <a href="notas.php" class="bg-[#faa] py-2 w-[40%] text-center">volver</a>
            </div>
        </form>
    </section>

    <main class="p-8 container-notas select-none pt-[15vh]">

        <section id="btn-new-note" class='container__nota $color w-[200px] h-[200px] rounded-xl flex justify-center items-center text-white hover:text-[#ccc]'>
            <i class="fa fa-plus text-[100px]" aria-hidden="true"></i>
        </section>

        <?php
            require 'controller/getNotes.php';
        ?>
    </main>


    <button id="btn-subir" class="hidden text-black fixed bottom-4 right-6  max-[480px]:right-2 bg-[#619fad] py-2 px-4 rounded hover:bg-[#74b3c1]">Subir</button>


    <script src="js/note.js"></script>
    <script src="js/formValidation.js"></script>
    <script src="js/formsEvent.js"></script>

    <?php
    require 'controller/alerts.php'
    ?>
</body>

</html>