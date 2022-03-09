<?php
include('conexion/conectar.php');
$usuario=$_POST['ingresoUser'];
$contraseña=$_POST['ingresoPassword'];
$passencript=md5($contraseña);
$_SESSION['ingresoUser']=$usuario;


$conexion=mysqli_connect("localhost","root","","match");

$consulta="SELECT*FROM usuarios where user='$usuario' and pcont='$passencript'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    echo "<script>window.location='index.php?pagina=sistema';</script>';";

}else{
    ?>
    <?php
    echo "<script>alert('Usuario y/o contraseña incorrecta')</script>;";

  ?>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);