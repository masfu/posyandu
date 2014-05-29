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

class Pengaturan extends Controller {
    
    /**
     * index page
     * @access public
     */
    public function gantiPassword() {
        $this->display("pengaturan/ganti_password.php");
    }
}
