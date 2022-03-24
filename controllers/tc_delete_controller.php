<?php

include "../models/Database.php";
include "../models/TeacherModel.php";

$model = new TeacherModel();

if (isset($_GET["idTc"])){
    $success = $model->deleteTeacher($_GET["idTc"]);
} else {
    $model->redirect("../views/index.php");
}


if ($success){
    echo "<script> alert('Usuario eliminado con éxito'); </script>";
    $model->redirect("../views/admin_docentes.php");
} else {
    echo "<script> alert('Hubo un problema'); </script>";
    $model->redirect("../views/admin_docentes.php");
}

?>