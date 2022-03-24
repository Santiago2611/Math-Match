<?php 

include "../models/Database.php";
include "../models/StudentModel.php";
$model = new StudentModel();

if (isset($_POST["boton_registrar"])){
    $name = $_POST["registroNombres"];
    $lastName = $_POST["registroApellidos"];
    $email = $_POST["registroEmail"];
    $password = $_POST["registroClave"];
    $passwordC = $_POST["confirmarClave"];
    $gender = $_POST["registroSexo"];
    $grade = $_POST["registroGrado"];
    $birthDate = $_POST["fechaNacimiento"];
} else {
    header("Location:index.php");
}

$emailAvaiable = $model->verifyEmail($email);
if (!$emailAvaiable){
    echo "<script> alert('Ya existe un usuario con este email'); </script>";
    $model->redirect("../views/registro_estudiante.php");
    exit();
}

$success = $model->insertStudent($name, $lastName, $email, $password, $gender, $grade, $birthDate);
if ($success){
    echo "<script> alert('¡Te has registrado con éxito!'); </script>";
    $model->redirect("../views/login.php");
} else {
    echo "<script> alert('Error al insertar los datos'); </script>";
    $db->redirect("../views/registro_estudiante.php");
}

?>