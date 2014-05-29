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
use app\models\Balita;
use app\models\MonitorBalita;

class LaporanBalita extends Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $like = App::instance()->input->get('q');
        $offset = App::instance()->input->get('page');
        $where = (isset($_GET['q'])) ? " nama LIKE '%" . $like . "%'" : '';
        $limit = 10;

        $this->daftar_balita = Balita::model()->find()->where($where)->limit($limit, $offset)->All();
        $this->paging = Balita::model()->paging($limit, $offset);
        $this->display("laporan_balita/index.php");
    }

    public function balita($id_balita) {
        $id_balita = intval($id_balita);
        $this->daftar_balita = MonitorBalita::model()->find()
                                                        ->where(" id_balita = ? ", [$id_balita])
                                                        ->orderBy("tanggal", "ASC")
                                                        ->All();
        $this->display("laporan_balita/balita.php");
    }

}
