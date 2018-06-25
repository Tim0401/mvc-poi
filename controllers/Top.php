<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 2018/06/23
 * Time: 2:46
 */

namespace Controllers;

class Top extends \Controller
{
    public function view($page = 'index')
    {
        if (!file_exists(APPPATH . 'views/top/' . $page . '.php')) {
            // ページがなかった場合
            show_404();
        }
        session_start();
        $data['title'] = ucfirst($page);
        $data['name'] = $data['tel'] = $data['email'] = '';

        if (isset($_SESSION['name'])) {
            $data['name'] = $_SESSION['name'];
        }
        if (isset($_SESSION['tel'])) {
            $data['tel'] = $_SESSION['tel'];
        }
        if (isset($_SESSION['email'])) {
            $data['email'] = $_SESSION['email'];
        }
        $_SESSION = array();
        if (isset($_POST['name'])) {
            $data['name'] = $_POST['name'];
        }
        if (isset($_POST['tel'])) {
            $data['tel']  = $_POST['tel'];
        }
        if (isset($_POST['email'])) {
            $data['email']  = $_POST['email'];
        }
        $this->load_model('Top',"model");
        $data['error'] = $this->model->exec();
        if($data['error']){
            $this->load_view('top/' . $page, $data);
        }else{
            $_SESSION['name'] = $data['name'];
            $_SESSION['tel'] = $data['tel'];
            $_SESSION['email'] = $data['email'];
            $this->load_view('top/confirm', $data);
        }
    }
    function register($page = 'index'){
        if (!file_exists(APPPATH . 'views/top/' . $page . '.php')) {
            // ページがなかった場合
            show_404();
        }
        session_start();
        if(!isset($_SESSION['name'])){
            header('Location:'.BASEPATH );
            exit;
        }
        $data['title'] = ucfirst($page);
        $user['name'] = $_SESSION['name'];
        $user['tel'] = $_SESSION['tel'];
        $user['email'] = $_SESSION['email'];
        // セッションの削除
        $_SESSION = array();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-42000);
        }
        session_destroy();
        $this->load_model('Top',"model");
        $data['data'] = $this->model->done($user);
        $this->load_view('top/done', $data);
    }
}