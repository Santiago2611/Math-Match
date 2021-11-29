<?php 

include "conexion/conectar.php";

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
   <link rel="stylesheet" href="css/estilos.css">
   <link rel="stylesheet" href="css/dark.css" class="theme">
   <link rel="stylesheet" href="css/styles.css">
   <link rel="stylesheet" href="css/light.css" class="theme">
</head>
<body>
   <div class="contenedor">
      <nav>
         <a class="logotipo" id="logotipo">Bienvenido <?php echo $_SESSION['ingresoUser']; ?> </a>
         <div class="enlaces">
            <a href="index.php?pagina=octavo">Octavo</a>
            <a href="index.php?pagina=noveno">Noveno</a>
            <a href="index.php?pagina=decimo">Décimo</a>
            <a href="index.php?pagina=once">Once</a>
            <label class="switch">
            <input type="checkbox" class="checkbox">
             <span class="slider round"></span>
            </label>
         </div>
      </nav>

      <section class="grid">
         <div class="card">
            <img src="img/factorizacion-og.jpg" alt="">
            <div class="botones"><br><br>
              <a class="boton primario">Ver más</a>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
         <div class="card">
            <img src="img/maxresdefault.jpg" alt="">
            <div class="botones">
              <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
         <div class="card">
            <img src="img/mqdefault.jpg" alt="">
            <div class="botones">
               <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
         <div class="card">
            <img src="img/maxresdefault (1).jpg" alt="">
            <div class="botones">
               <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
         <div class="card">
            <img src="img/maxresdefault (2).jpg" alt="">
            <div class="botones">
               <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
         <div class="card">
            <img src="img/maxresdefault (3).jpg" alt="">
            <div class="botones">
                <a class="boton primario">Ver más</a><br><br>
               <a href="#" class="boton primario">Ver más</a>
            </div>
         </div>
      </section>
   </div>
   <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
       <span>  <i class="fas fa-bars"></i></span>
    </button>
     <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?pagina=salir">Cerrar sesión</a>
    </div>

   <script src="js/main.js"></script>
   
</body>
</html>
<?php
 if (isset($_GET["pagina"])){ 
            if($_GET["pagina"] == "octavo" ||
            $_GET["pagina"] == "noveno" ||
            $_GET["pagina"] == "decimo" ||
            $_GET["pagina"] == "once" ){


            }

      }else{

         include "inicio.php";

      }

   ?>