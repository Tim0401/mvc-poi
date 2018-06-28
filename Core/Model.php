<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 2018/06/23
 * Time: 15:04
 */

namespace Core;

class Model
{
    protected $database;
    function set_database($db){
        $this->database = $db;
    }
}