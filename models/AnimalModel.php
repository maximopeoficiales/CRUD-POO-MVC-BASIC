<?php
require_once("../models/Model.php");
class AnimalModel extends Model
{
    public function set($animal_data = array())
    {
        /* las variables variables crea variables del contenido de un array */
        foreach ($animal_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "REPLACE INTO animales(id_animal,nombre,raza,observacion)
        VALUES('$id_animal','$nombre','$raza','$observacion')";
        /* ejecuto el query */
        $this->set_query();
    }

    public function get($id_animal = '')
    {
        $this->query = ($id_animal != '')
            ? "SELECT * FROM animales WHERE id_animal = '$id_animal'"
            : "SELECT * FROM animales";
        $this->get_query();

        $data = array();
        foreach ($this->rows as $key => $value) {
            array_push($data, $value);
        }
        return $data;
    }
    
    public function del($id_animal = '')
    {
        $this->query = "DELETE FROM animales WHERE id_animal= '$id_animal'";
        $this->set_query();
    }
}
