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


	<title>Octavo</title>

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

		


</head>
<body>

	
<center><h1>Grado 8°</h1></center>
<center><button type="button" class="btn btn-primary">Factorización de binomios</button>
<button type="button" class="btn btn-secondary">Factorización de Trinomios</button>
<button type="button" class="btn btn-success">Máximo Común Divisor de Monomios</button>
<button type="button" class="btn btn-warning">Máximo Común Divisor de Polinomios</button>
<button type="button" class="btn btn-danger">Mínimo Común Múltiplo de Monomios</button>
<button type="button" class="btn btn-dark">Mínimo Común Múltiplo de Polinomios</button>
<button type="button" class="btn btn-outline-danger">Factor Común</button></center>

<a href="index.php?pagina=sistema">Volver</a>

</body>
</html>


