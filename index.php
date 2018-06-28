<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 2018/06/23
 * Time: 1:33
 */

// アプリケーションのパス(models,views,controllersの親フォルダ)
define("APPPATH", dirname(__FILE__) . "/");
// ルートパス
define("BASEPATH", "/mvc-poi/");
define("MOVIEPATH", BASEPATH."asset/movie/");

spl_autoload_register(
    function ($class_name)
    {
        $file = APPPATH .str_replace("\\", "/", $class_name) . ".php";
        require_once($file);
    }
);

require_once('func.php');

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
    $controller = "pages";
    $method = "view";
    $view = "index";
}

// controller読み込み
if (!file_exists(APPPATH . 'controllers/' . $controller . '.php')) {
    show_404();
}
$controller = "\Controllers\\".$controller;
if (!class_exists($controller)) {
    show_404();
}
$c = new $controller;

// controllerクラスのメソッド呼び出し
$c->$method($view);