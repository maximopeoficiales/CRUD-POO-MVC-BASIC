<?php
include("includes/header.php");
require_once("../controllers/AnimalController.php");
if (isset($_GET["id"])) {
    $animales_controller = new AnimalController();
    $animal = $animales_controller->del($_GET["id"]);
    header("Location: animal-show.php");
}else{
    echo "Error no se envio id";
}