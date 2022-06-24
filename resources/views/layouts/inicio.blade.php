<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/math.png')}}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <style>
      html, body {
          height: 100%;
      }

      body {
         display: flex;
      }

      aside {
         min-width: 150px;
         width: 20%;
         color: lightgray;
      }

      a {
         text-decoration: none;
         width: 100%;
         font-size: 1.5em;
         color: lightgray;
      }

      aside a:hover {
         color: gray;
      }
   </style>
</head>
<body>

    <aside class="position-relative h-100 p-2 bg-dark">
        <h3>Math-Match <span style="color: lightblue;">@yield('users')</span></h3>
        <nav>
           <ul class="nav flex-column text-center">
              <li>@yield('init')</li>
              <li>@yield('class')</li>
              <li>@yield('more_class')</li>
              <li><a href="configuracion.php">Configuración</a></li>
              <li><a href="logout.php">Cerrar sesión</a></li>
           </ul>
        </nav>
      </aside>

      @yield('content')


</body>
</html>
