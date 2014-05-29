<?php

namespace app\controllers;

/**
 * Description of welcome
 * @package name
 * @author masfu
 * @copyright (c) 2014, Masfu Hisyam
 */
use \App;
use app\core\Controller;

class Login extends Controller {

    public function permission() {
        return array(
            'index' => array('cache' => false, 'allowed_user' => 'guest', 'admin'),
            'dokumentasi' => array('cache' => false, 'allowed_user' => 'guest', 'admin'),
            'classReference' => array('cache' => false, 'allowed_user' => 'guest', 'admin'));
    }

    /**
     * index page
     * @access public
     */
    public function index() {
        $this->startCache();
        $this->display("login\index.php");
    }

    public function authenticate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $remember = $this->input->post('remeber');

        if ($this->auth->authenticate($username, $password, $remember, $role)) {
            $this->redirect('Beranda');
        } else {
            $this->redirect('Login');
        }
    }

}
