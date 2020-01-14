<?php
include("includes/header.php");
require_once("../controllers/AnimalController.php");
$animales_controller = new AnimalController();
$animales = $animales_controller->get();
if (empty($animales)) {
    print(`
    <p class="text-center">No hay animales registrados</p>
    <a href="animal_edit.php" class="btn btn-danger"></a>   
    
    `);
} else {
    /* print("hola si hay datos :v </br>");
    var_dump($animales); */


    $template_animales = '
    <div class="row">
        <div class="col-md-4">
          <div class="card card-body">
          <form action="animal-register.php" method="post">
            <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Escribe el nombre" autofocus/>

            </div>
            <div class="form-group">
                <input type="text" name="raza" class="form-control" placeholder="Escribe la raza">
                
            </div>
            <div class="form-group">
                <textarea name="observacion" rows="2" class="form-control" placeholder="Escribe una observacion"></textarea>
            </div>
             <input type="submit" class="btn btn-primary btn-block" name="guardar_animal" value="Guardar datos">
          </form>
          </div>
        </div>
    ';
    $template_animales .= '
    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Raza</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        <tbody>
        ';



    for ($i = 0; $i < count($animales); $i++) {
        $template_animales .= '
        <tr>
        <td>' . $animales[$i]['nombre'] . '</td>
        <td>' . $animales[$i]['raza'] . '</td>
        <td>' . $animales[$i]['observacion'] . '</td>
        
        <td>
            <a href="animal-edit.php?id=' . $animales[$i]['id_animal'] . '"class="btn btn-success">
                <i class="fas fa-marker"></i>
            </a>
            <a href="animal-delete.php?id=' . $animales[$i]['id_animal'] . ' "class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
            </a>

        </td>
        </tr>
        ';
    }

    $template_animales .= "
                </tbody>
            </table>
        </div>
    </div>    
    ";
    print($template_animales);
}


?>
<?php
include("includes/footer.php");

?>