<?php 

	include "conexion/conectar.php";

	if(!isset($_SESSION['ingresoUser'])){

		echo "<script>window.location='index.php?pagina=ingreso';</script>";


	}
	
 ?>
<!DOCTYPE html>
<html>
<head>


	<meta charset="utf-8">


	<title>Décimo</title>

		<!-- Plugins CSS -->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <!-- plugins JS -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<style>
		

		<style>
	
	body{

		background: white;

	}


	</style>

</head>
<body>

	
<center><h1>Grado décimo</h1></center>
<center><button type="button" class="btn btn-primary">Gráfica de la función del seno y del coseno</button>
<button type="button" class="btn btn-secondary">Gráfica de las funciones tangente, cotangente, secante y cosecante</button>
<button type="button" class="btn btn-success">Funciones inversas</button>
<button type="button" class="btn btn-warning">Inversa del seno</button>
<button type="button" class="btn btn-danger">Inversa del coseno</button>
<button type="button" class="btn btn-dark">Inversa de la tangente</button>
<button type="button" class="btn btn-outline-danger">Funciones para adición y multiplicación de ángulos</button></center>



<a href="index.php?pagina=sistema">Volver</a>

</body>
</html>


