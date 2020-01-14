<?php
include("includes/header.php");
require_once("../controllers/AnimalController.php");
if (isset($_POST["guardar_animal"])) {
    $animales_controller = new AnimalController();
    $new_animal = array(
        'nombre' => $_POST['nombre'],
        'raza' => $_POST['raza'],
        'observacion' => $_POST['observacion']

    );
    $animal = $animales_controller->set($new_animal);
    header("Location: animal-show.php");
}else{
    echo "No se enviaron datos";
}
