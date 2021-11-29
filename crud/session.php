<?php 

include "CRUD.php";
$crud = new CRUD();

if (!isset($_POST["boton_ingreso"])){
    $crud->redirect("../views/login.php");
    exit();
}

$user = $_POST["ingresoUsuario"];
$password = $_POST["ingresoClave"];

$success = $crud->logIn($user,$password);

if ($success){
    header("location:../views/inicio_estudiante.php");
} else {
    echo "<script> alert('Usuario y/o contraseña incorrectos, valida de nuevo los datos'); </script>";
    $crud->redirect("../views/login.php");
}

?>