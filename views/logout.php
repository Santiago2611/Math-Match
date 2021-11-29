<?php 

include "../crud/CRUD.php";

session_start();
session_destroy();

CRUD::redirect("index.php");

 ?>