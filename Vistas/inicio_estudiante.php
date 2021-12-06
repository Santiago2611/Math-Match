
<?php 

include "../bootstrapCDN.php"; //Librería bootstrap
include "../crud/CRUD.php";
$crud = new CRUD();

session_start();
if (empty($_SESSION['name'])) {
  echo "<script> alert('No has iniciado sesión'); </script>";
  $crud->redirect("login.php");
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
      <style>

         h3-p{

            font-family: verdana;
            text-align: center;

         }

      </style>
    

   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title></title>
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet"> 
   <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="../css/estilos.css">
   
</head>
<body>
   <div class="contenedor">
      <nav>
         <h4 class="logotipo" id="logotipo">Bienvenido, <?php echo $_SESSION['name']; ?> </h4>
         <div class="enlaces">
           <a href="inicio_estudiante.php">Inicio</a>
            <a href="buscar.php">Buscar clases</a>
            <a href="clases.php">Tus clases</a>
            <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              <span>  <i class="fas fa-bars"></i></span>
            </button>
            <div class="dropdown-menu">
               <a class="dropdown-item" href="configuracion.php">Configuración</a>
               <a style="cursor: pointer;" class="dropdown-item">Tema oscuro</a>
               <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
            </div>
         </div>
      </nav>

      <section class="grid">
         <div class="card">
            <img src="../images/img1.jpg" alt="">
            <div class="botones"><br><br>
               <a class="boton primario">Ver más</a>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
         <div class="card">
            <img src="../images/img2.jpg" alt="">
            <div class="botones">
              <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
         <div class="card">
            <img src="../images/img3.jpg" alt="">
            <div class="botones">
               <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
         <div class="card">
            <img src="../images/img2.jpg" alt="">
            <div class="botones">
               <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
         <div class="card">
            <img src="../images/img3.jpg" alt="">
            <div class="botones">
               <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
         <div class="card">
            <img src="../images/img1.jpg" alt="">
            <div class="botones">
                <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
      </section>
        </div>
   
</body>
</html>