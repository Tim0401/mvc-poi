<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 2018/06/23
 * Time: 2:47
 */

namespace Core;

class Controller
{
    protected $db;
    protected $model_name;
    protected function load_view($path, $data)
    {
        if (is_array($data)) {
            extract($data);
        }
        require_once(APPPATH . "views/" . $path . ".php");
    }

    protected function load_model($path, $name, $db = FALSE)
    {
        $this->model_name = $name;
        require_once(APPPATH . "models/" . $path . ".php");
        $class = "\models\\".$path;
        $this->$name = new $class();
        if($db){
            $this->load_database();
        }
    }
    protected function load_database($congig = FALSE){
        require_once(APPPATH . "Database.php");
        $this->db = new Database($congig);
        $model = $this->model_name;
        $this->$model->set_database($this->db);
    }
}