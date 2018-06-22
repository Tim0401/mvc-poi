<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 2018/06/23
 * Time: 2:46
 */

class Top extends Controller
{
    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/top/' . $page . '.php')) {
            // ページがなかった場合
            show_404();
        }
        $data['title'] = ucfirst($page);
        //$this->load_view('templates/header', $data);
        $this->load_view('top/' . $page, $data);
        //$this->load_view('templates/footer', $data);
    }
}