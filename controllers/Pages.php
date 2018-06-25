<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 2018/06/23
 * Time: 1:58
 */

namespace Controllers;

class Pages extends \Controller
{
    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            // ページがなかった場合
            show_404();
        }
        $data['title'] = ucfirst($page);
        $this->load_model('Pages',"model");
        $this->model->lul();
        $this->load_view('pages/' . $page, $data);
    }
}