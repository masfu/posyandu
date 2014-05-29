<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of LaporanIbu
 *
 * @author masfu
 */
use \App;
use app\core\Controller;
use app\models\Ibu;

class LaporanIbu extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $like = App::instance()->input->get('q');
        $offset = App::instance()->input->get('page');
        $where = (isset($_GET['q'])) ? " nama LIKE '%" . $like . "%'" : '';
        $limit = 10;

        $this->daftar_ibu = Ibu::model()->find()->where($where)->limit($limit, $offset)->All();
        $this->paging = Ibu::model()->paging($limit, $offset);
        $this->display("laporan_ibu/index.php");
    }

    public function ibu() {
        App::import(DIR_APP . '/app/moduls/qrcode/qrlib.php');

        $like = App::instance()->input->get('q');
        $offset = App::instance()->input->get('page');
        $where = (isset($_GET['q'])) ? " nama LIKE '%" . $like . "%'" : '';
        $limit = 10;
        $this->daftar_ibu = Ibu::model()->find()->where($where)->limit($limit, $offset)->All();
        $this->paging = Ibu::model()->paging($limit, $offset);
        $this->display("laporan_ibu/ibu.php");
    }

}
