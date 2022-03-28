<?php 

include "../models/Database.php";
include "../models/ClassModel.php";
$model = new ClassModel();

if (!isset($_POST["joinButton"])) {
    header("location:index.php");
}

session_start();

$success = $model->joinClass($_SESSION["id"], $_POST["c"]);
if ($success){
    echo "<script> alert('¡Has ingresado a la clase ".$_GET["class"]." !'); </script>";
    $model->redirect("../views/buscar_clase.php");
} else {
    echo "<script> alert('Hubo un error al ingresar'); </script>";
    $model->redirect("../views/buscar_clase.php");
}

?>