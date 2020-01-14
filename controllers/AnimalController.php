<?php
require_once("../models/AnimalModel.php");
class AnimalController{
    private $model;
    public function __construct()
    {
        $this->model = new AnimalModel();
        
    }
    public function set($animal_data= array()){
            return $this->model->set($animal_data);
    }
    public function get($id_animal = '')
    {
        return $this->model->get($id_animal);
    }

    public function del($id_animal = '')
    {
        return $this->model->del($id_animal);
    }
    
}