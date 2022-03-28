<?php 

include "../models/Database.php";
include "../models/ClassModel.php";
include "../layouts/Layouts.php";
$model = new ClassModel();

session_start();
if (empty($_SESSION['studentName'])) {
  echo "<script> alert('No has iniciado sesión'); </script>";
  $model->redirect("login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php Layouts::head("Math-Match","../css/styles.css"); ?>
    <style>
        .container-fluid, .container-fluid input, .container-fluid button {
            font-size: 1.2em;
        }

        .card {
            background: lightgray;
            display: inline-block;
            width: 48%;
            padding: 10px;
            margin: 10px;
        }
    </style>
</head>
<body>

    <div class="container-fluid p-3">
        <label for="searchClasses">Ingresa el nombre de la clase que deseas buscar</label>
        <form action="buscar_clase.php" method="get" class="input-group">
            <input type="text" name="busqueda" placeholder="Clase..." class="form-control p-2">
            <button type="submit" value="Buscar" class="btn btn-info">
                <i class="fas fa-search"></i> Buscar
            </button>
        </form>
        <a href="inicio_estudiante.php">Volver a inicio...</a>
    </div><hr>

    <?php 
    
    if (isset($_GET["busqueda"])) {
        $results = $model->searchClasses($_GET["busqueda"]);
        while ($rows = mysqli_fetch_array($results)) { ?>

            <div class="position-relative card">
                <div>
                    <h3><?php echo $rows[0]; ?></h4>
                    <h5><?php echo $rows[1]; ?></h5>
                </div>
                <div>
                    <p><?php echo $rows[2]; ?></p>
                    <p>Líder: <b><?php echo $rows[3]; ?></b></p>
                </div>
                <form action="../controllers/join_class_controller.php?class=<?php echo $rows[0]; ?>" method="post">
                    <input type="hidden" name="c" value="<?php echo $rows[4]; ?>"> <!-- le envío el id de la
                    clase por medio de una variable del backend, así no se podrá obtener el id, ya que es algo
                    privado -->
                    <?php 
                    if ($model->verifyIfAlreadyInClass($rows[4], $_SESSION["id"])) { ?>
                        <button type="" class="btn btn-info" disabled>Unirme</button>
                        <p class="text-danger">Ya perteneces a esta clase</p>
                    <?php } else { ?>
                        <button type="submit" name="joinButton" class="btn btn-info">Unirme</button>
                    <?php } ?>
                    
                </form>
            </div>
<?php   
        } //cierro while
    } //cierro if ?>
    
</body>
</html>