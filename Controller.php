<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 2018/06/23
 * Time: 2:47
 */

class Controller
{
    protected function load_view($path, $data)
    {
        if (is_array($data)) {
            extract($data);
        }
        require_once(APPPATH . "views/" . $path . ".php");
    }

    protected function load_model($path, $data)
    {
        if (is_array($data)) {
            extract($data);
        }
        require_once(APPPATH . "models/" . $path . ".php");
        $this->$path = new $path;
    }
}