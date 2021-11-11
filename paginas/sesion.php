<?php 

include "conexion.php";
if (isset($_POST['boton_registrar'])){
	$pwd1 = $_POST['registroPassword'];
	$pwd2 = $_POST['sPassword'];

	if ($pwd1 == $pwd2){
		$nombre = $_POST['registroNombre'];
		$email = $_POST['registroEmail'];
		$rol = $_POST['rol'];
		$passencript = md5($pwd1);
		$conexion = mysqli_query($conectar,"INSERT INTO usuarios(nombre,email,password,rol) VALUES('$nombre','$email','$passencript','$rol')") or die($conectar."Error en la conexión");
		echo "<script>alert('Registro éxitoso')</script>";
		echo "<script>window.location='ingreso.php'</script>";
	}	else{
			echo "<script>alert('Las contraseñas no coinciden')</script>";
					echo "<script>window.location='registro.php'</script>";

	}

}


 ?>