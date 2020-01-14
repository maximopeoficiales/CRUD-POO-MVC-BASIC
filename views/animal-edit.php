<?php
include("includes/header.php");
require_once("../controllers/AnimalController.php");
$animales_controller = new AnimalController();
if (isset($_GET["id"])) {
    $animal = $animales_controller->get($_GET["id"]);
    $nombre = $animal[0]["nombre"];
    $raza = $animal[0]["raza"];
    $observacion = $animal[0]["observacion"];
    /* echo "$nombre,$raza,$observacion "; */
}
if (isset($_POST["update"])) {
    $update_animal = array(
        'id_animal' => $_GET['id'],
        'nombre' => $_POST['nombre'],
        'raza' => $_POST['raza'],
        'observacion' => $_POST['observacion']

    );
    $animal = $animales_controller->set($update_animal);
    /* if (isset($animal)) {
        echo "todo correcto";
    } */
    header("Location: animal-show.php");
}

$template_animal = '
<div class="container p-4 text-center">
    <div class="row">
        <div class="col-md-4 mx-auto">
        <form action="animal-edit.php?id=' . $_GET["id"] . ' "method="post">
            <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Escribe el nombre" value="' . $nombre . '" autofocus/>
            </div>
            <div class="form-group">
                <input type="text" name="raza" class="form-control" placeholder="Escribe la raza" value="' . $raza . '">
            </div>
            <div class="form-group">
                <textarea name="observacion" rows="2" class="form-control" placeholder="Escribe una observacion">' . $observacion . '</textarea>
            </div>
            <button class="btn btn-success" name="update">
                    Update
                </button>
        </form>
        </div>
    
    </div>
</div>

';
print($template_animal);
