<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 2018/06/23
 * Time: 1:33
 */

define("APPPATH", dirname(__FILE__) . "/");

spl_autoload_register(
    function ($class_name)
    {
        $dirs = array(
            '',
            'controllers/'
        );
        foreach($dirs as $dir)
        {
            $file = APPPATH. $dir. '/'. $class_name. '.php';
            if (file_exists($file)) {
                require_once $file;
                break;
            }
        }
    }
);

function show_404()
{
    require_once('404.php');
    exit;
}

// URIパース
// このファイル名を記述
$uri = $_SERVER["REQUEST_URI"];
// GETデータとURLを分離
$uri = explode("?", $uri);
$path = explode("/", $uri[0]);
// URIの最後をメソッド名として取得
if (isset($_SERVER['PATH_INFO'])) {
    $view = end($path);
    $method = $path[count($path) - 2];
    $controller = ucfirst($path[count($path) - 3]);
} else {
    // デフォルト設定
    $view = "index";
    $method = "view";
    $controller = "Top";
}

// controller読み込み
if (!file_exists(APPPATH . 'controllers/' . $controller . '.php')) {
    show_404();
}
if (!class_exists($controller)) {
    show_404();
}
$c = new $controller;

// controllerクラスのメソッド呼び出し
$c->$method($view);