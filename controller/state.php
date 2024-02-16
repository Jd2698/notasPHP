<?php
session_start();
if(isset($_SESSION['state'])){
}else{
    header('Location: index.php');
}