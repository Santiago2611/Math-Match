<?php 
	session_start();
	include "conexion.php";
	if (isset($_POST['boton_ingreso'])){
		$nombre = $_POST['nombre'];
		$pwd2 = $_POST['ingresoPassword'];
		$rol = $_POST['rol'];
		$passencript = md5($pwd2);
		$consulta = mysqli_query($conectar,"SELECT * FROM usuarios WHERE nombre='$nombre' and password='$passencript' and rol='$rol'") or die($conectar."Problemas en la consulta");
			
		$num = mysqli_num_rows($consulta);
		if ($num != false){
			while ($fila = mysqli_fetch_array($consulta)){
				$_SESSION['nombre'] = $fila['nombre'];
				$_SESSION['rol'] = $fila['rol'];
				if ($consulta == true) {
					if($rol == "estudiante"){
					echo "<script>alert('Inicio de sesión correcto');</script>";
					echo "<script>window.location='inicio_estudiante.php';</script>";
				}else{
					echo "<script>alert('Inicio de sesión correcto');</script>";
					echo "<script>window.location='inicio_docente.php';</script>";
				}
				}
				}
			}else{
					echo "<script>alert('Usuario, contraseña y/o rol no coinciden');</script>";
					echo "<script>window.location='ingreso.php';</script>";
	}
		}


 ?>