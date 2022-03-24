<?php 

include "../models/Database.php";
include "../models/TeacherModel.php";
$model = new TeacherModel();

if (isset($_POST["boton_registrar_doc"])){
    $name = $_POST["registroNombres"];
    $lastName = $_POST["registroApellidos"];
    $specialties = $_POST["registroEspecialidades"];
    $password = rand(10000, 99999); //genera una contraseña aleatoria de cinco caracteres
    $tel = $_POST["registroTelefono"];
    $email = $_POST["registroEmail"];
    $gender = $_POST["registroSexo"];
} else {
    header("Location:index.php");
}

$emailAvaiable = $model->verifyEmail($email);
if (!$emailAvaiable){
    echo "<script> alert('Ya existe un usuario con este email'); </script>";
    $model->redirect("../views/registro_docente.php");
    exit();
}

$success = $model->insertTeacher($name, $lastName, $email, $specialties, $gender, $tel, $password);
if ($success){
    echo "<script> alert('Docente registrado con éxito, se ha generado una contraseña aleatoria'); </script>";
    $model->redirect("../views/admin_docentes.php");
} else {
    echo "<script> alert('Error al insertar los datos'); </script>";
    $model->redirect("../views/admin_docentes.php");
}

?>