<?php

include "../bootstrapCDN.php"; //Librería bootstrap 
include "../crud/CRUD.php";

$crud = new CRUD();

if (isset($_GET["idSt"])){
    $success = $crud->deleteStudent($_GET["idSt"]);
} else if (isset($_GET["idTc"])){
    $success = $crud->deleteTeacher($_GET["idTc"]);
} else {
    $crud->redirect("../views/index.php");
}


if ($success){
    echo "<script> alert('Usuario eliminado con éxito'); </script>";
    $crud->redirect("../views/admin_estudiantes.php");
} else {
    echo "<script> alert('Hubo un problema'); </script>";
    $crud->redirect("../views/admin_estudiantes.php");
}

?>