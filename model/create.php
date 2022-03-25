<?php 

include "CRUD.php";
$crud = new CRUD();

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

$emailAvaiable = $crud->verifyEmail($email);
if (!$emailAvaiable){
    echo "<script> alert('Ya hay un usuario con este email'); </script>";
    $crud->redirect("../views/registro_estudiante.php");
    exit();
}

$success = $crud->insertStudent($name, $lastName, $email, $password, $gender, $grade, $birthDate);
if ($success){
    echo "<script> alert('¡Te has registrado con éxito!'); </script>";
    $crud->redirect("../views/login.php");
} else {
    echo "<script> alert('Error al insertar los datos'); </script>";
    $crud->redirect("../views/registro_estudiante.php");
}

?>