<?php 

include "../models/Database.php";
include "../models/ClassModel.php";

$model = new ClassModel();

if (isset($_POST["boton_crear_clase"])) {
    $className = $_POST["nombreClase"];
    $culmination = $_POST["culminacion"];
    $desc = $_POST["descripcion"];
} else {
    header("location:index.php");
}

session_start();
$success = $model->createClass($className, $culmination, $desc, $_SESSION["id"]);

if ($success){
    echo "<script> alert('Clase creada con éxito, la puedes ver en -Mis clases-'); </script>";
    $model->redirect("../views/inicio_docente.php");
} else {
    echo "<script> alert('Error al crear la clase'); </script>";
    $model->redirect("../views/crear_clase.php");
}

?>