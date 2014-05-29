<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\controllers;

/**
 * Description of welcome
 * @package name
 * @author masfu
 * @copyright (c) 2014, Masfu Hisyam
 */
use App;
use app\core\Controller;

class Logout extends Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->redirect('login');
    }
}
