<?php 

include "../models/Database.php";

session_start();
session_destroy();

Database::redirect("index.php");

 ?>