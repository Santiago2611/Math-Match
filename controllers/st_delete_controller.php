<?php

include "../models/Database.php";
include "../models/StudentModel.php";

$model = new StudentModel();

if (isset($_GET["idSt"])){
    $success = $model->deleteStudent($_GET["idSt"]);
} else {
    $model->redirect("../views/index.php");
}


if ($success){
    echo "<script> alert('Usuario eliminado con éxito'); </script>";
    $model->redirect("../views/admin_estudiantes.php");
} else {
    echo "<script> alert('Hubo un problema'); </script>";
    $model->redirect("../views/admin_estudiantes.php");
}

?>