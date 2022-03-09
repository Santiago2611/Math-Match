<?php 

include "CRUD.php";
$crud = new CRUD();

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

$emailAvaiable = $crud->verifyEmail($email);
if (!$emailAvaiable){
    echo "<script> alert('Ya hay un usuario con este email'); </script>";
    $crud->redirect("../views/registro_docente.php");
    exit();
}

$success = $crud->insertTeacher($name, $lastName, $email, $specialties, $gender, $tel, $password);
if ($success){
    echo "<script> alert('Docente registrado con éxito, se ha generado una contraseña aleatoria'); </script>";
    $crud->redirect("../views/admin_docentes.php");
} else {
    echo "<script> alert('Error al insertar los datos'); </script>";
    $crud->redirect("../views/admin_docentes.php");
}

?>