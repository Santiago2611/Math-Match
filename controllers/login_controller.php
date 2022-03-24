<?php 

include "../models/Database.php";
include "../models/LoginModel.php";
$model = new LoginModel();

if (!isset($_POST["boton_ingreso"])){
    $model->redirect("../views/login.php");
    exit();
}

$user = $_POST["ingresoEmail"];
$password = $_POST["ingresoClave"];

$success = $model->studentLogIn($user,$password); //intenta logearse como estudiante

if ($success){
    //se ejecuta si encontró un estudiante con dicho correo en la base de datos
    header("location:../views/inicio_estudiante.php");
} else { //si no, busca en la base de datos e intenta logearse como docente
    $success = $model->teacherLogIn($user,$password);
    if ($success){
        header("location:../views/inicio_docente.php");
    } else {
        //si no se cumplió ninguna de las condiciones de arriba, quiere decir que el usuario no existe
        echo "<script> alert('Usuario y/o contraseña incorrectos, valida de nuevo los datos'); </script>";
        $model->redirect("../views/login.php");
    }
}

?>