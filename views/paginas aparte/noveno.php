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


	<title>Noveno</title>

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

	
<center><h1>Grado noveno</h1></center>

<center><button type="button" class="btn btn-primary">Números Reales</button>
<button type="button" class="btn btn-secondary">Expresión decimal de un número Real</button>
<button type="button" class="btn btn-success">Ubicación de reales en la recta</button>
<button type="button" class="btn btn-warning">Exponentes enteros</button>
<button type="button" class="btn btn-danger">Radicales y operaciones</button>
<button type="button" class="btn btn-dark">Racionalización</button>
<button type="button" class="btn btn-outline-danger">Ecuaciones con radicales simples</button></center>

<a href="index.php?pagina=sistema">Volver</a>




</body>
</html>


