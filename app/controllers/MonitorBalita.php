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
use app\models as model;

class MonitorBalita extends Controller {

    /**
     * constructor
     */
    public function __construct() {
        parent::__construct();
    }

    public function permission() {
        return array(
            'index' => array('cache' => false, 'allowed_user' => 'guest', 'admin'));
    }

    /**
     * index page
     * @access public
     */
    public function index() {
        $balita = new model\MonitorBalita();

        $like = App::instance()->input->get('q');
        $offset = App::instance()->input->get('page', 0);
        $bulan = App::instance()->input->get('bulan', date('m'));
        $tahun = App::instance()->input->get('tahun', date('Y'));

        $limit = 10;
        $this->daftar_balita = $balita->getMonitor($offset, $limit, $bulan, $tahun);
        $this->paging = $balita->paging($limit, $offset);
        $this->thn_selected = $tahun;
        $this->bln_selected = $bulan;
        $this->display("monitor_balita/index.php");
    }

    public function tambah() {
        if (App::instance()->input->isPost()) {
            $balita = new model\MonitorBalita();
            $balita->attributes = $_POST;
            $balita->tanggal = date('Y-m-d', strtotime(App::instance()->input->post('tanggal')));

            if ($balita->save()) {
                //  $this->redirect('MonitorBalita');
            }
        }
        $this->display("monitor_balita/form.php");
    }

    public function parseQrcode() {
        $qrcode = App::instance()->input->post('qrcode');
        $id = base64_decode($qrcode);
        $ibu = new model\Ibu();

        $data_ibu = $ibu->findByPk($id)->One();
        $monitor = $ibu->findBySql("select * from monitor_ibu where id_ibu = ? order by id_monitor_ibu desc limit 1", array($id))->One();

        $data['id'] = $data_ibu['id'];
        $data['nama'] = $data_ibu['nama'];
        $data['berat_sebelum'] = isset($monitor['berat_sesudah']) ? $monitor['berat_sesudah'] : 0;
        echo $this->outputJson($data);
    }

}
