<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['state'])){
    header('Location: notas.php');
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">

    <title>Document</title>
</head>

<body>

    <form id="form-login" action="controller/loginController.php" method="post">

        <div id="invalid" style="display:none;">Complete los campos</div>
        <?php
        if (isset($_SESSION['login-error'])) {
            if ($_SESSION['login-error'] == true) {
                echo "<div class='login-error'>Had an error</div>";
                session_destroy();
            }
        }
        ?>
        <div class="form__left">
            <img src="img/loginNote.png" alt="">
        </div>

        <div class="form__right">
            <div class="group">
                <label for="inp-name">Name</label>
                <input id="inp-name" name="name" type="text" autofocus>
            </div>
            <div class="group">
                <label for="inp-password">Password</label>
                <input id="inp-password" name="password" type="password">
            </div>
            <input id="btn-submit" type="submit" value="Log in">
        </div>

    </form>
    <script src="js/index.js"></script>
</body>

</html>