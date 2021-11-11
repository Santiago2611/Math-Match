<?php include "../bootstrapCDN.php" //Librería bootstrap ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/estilo_index.css">
  <title>¡Bienvenido a Math Match!</title>
  <link rel="shortcut icon" href="../img/math.png" width="800px">
</head>
<body>

    <header>
      <button onclick="toggleMenu();" type="button" id="abrir_menu"><i class="fas fa-bars"></i><b> Menú</b></button>
      <button class="btn btn-primary" id="ingresar">Ingresar</button>
    </header>

    <nav class="menu hideMenu">
      <ul>
        <a href="index.php"><li>Inicio <i class="fas fa-house-user"></i></li></a>
        <a href="registro.php"><li>Crea tu cuenta <i class="fas fa-pencil-alt"></i></li></a>
        <a href="ingreso.php"><li>Ingresar <i class="fas fa-user"></i></li></a>
        <a href=""><li>Hay un problema <i class="fas fa-bug"></i></li></a>
        <a href=""><li>¡Apoyanos! <i class="fas fa-heart"></i></li></a>
      </ul>
    </nav>

  <!-- slider -->
  <center>
  <div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../imagenes/image.jpg" class="carousel-img">
      </div>
      <div class="carousel-item">
        <img src="../imagenes/image2.png" class="carousel-img">
      </div>
      <div class="carousel-item">
        <img src="../imagenes/image3.jpg" class="carousel-img">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div> <!--fin slider -->
</center>

  <script>
    menu = document.getElementsByTagName("nav")[0];
    texto = document.getElementsByTagName("b")[0];

    var toggleMenu = function(){
      if (menu.className == "menu hideMenu") {
        menu.className = "menu";
        texto.textContent = " Cerrar";
      } else {
        menu.className = "menu hideMenu";
        texto.textContent = " Menú";
      }
    }
  </script>

</body>
</html>
  