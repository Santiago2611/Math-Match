<?php 

class Layouts {

    //head con los estilos, etc
    public static function head($title, $stylesRoute) { ?>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $title ?></title>
        <link rel="icon" type="image/x-icon" href="../images/math.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo $stylesRoute ?>" rel="stylesheet" />
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script><?php
    }

    //navbar de la página
    public static function header(){ ?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Math-Match</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
                        <div class="dropdown">
                            <li class="nav-item"><a class="nav-link" href="registro_estudiante.php">Registrarse</a></li>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </nav> <?php
    }

    public static function teacherUserNav(){ ?>
        <aside class="position-relative h-100 p-2 bg-dark">
          <h3>Math-Match <span style="color: orange;">Docentes</span></h3>
          <nav>
             <ul class="nav flex-column text-center">
                <li><a href="inicio_docente.php">Inicio</a></li>
                <li><a href="ver_clases.php">Mis clases</a></li>
                <li><a href="crear_clase.php">Crear una clase</a></li>
                <li><a href="configuracion.php">Configuración</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
             </ul>
          </nav>
        </aside>
        <?php
    }

    public static function studentUserNav(){ ?>
        <aside class="position-relative h-100 p-2 bg-dark">
          <h3>Math-Match <span style="color: lightblue;">Estudiantes</span></h3>
          <nav>
             <ul class="nav flex-column text-center">
                <li><a href="inicio_estudiante.php">Inicio</a></li>
                <li><a href="#">Mis clases</a></li>
                <li><a href="buscar_clase.php">Buscar clases</a></li>
                <li><a href="configuracion.php">Configuración</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
             </ul>
          </nav>
        </aside>
        <?php
    }

    public static function footer(){ ?>
        <footer class="py-5 bg-black">
        <div class="container px-5"><p class="m-0 text-white small">Copyright &copy; Math-Match 2021</p>
            <a href="">Preguntas frecuentes</a><br>
            <a href="">Apóyanos</a>
        </div>
        </footer>
        <?php
    }

}

?>
