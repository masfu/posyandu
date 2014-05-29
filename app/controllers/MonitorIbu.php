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

class MonitorIbu extends Controller {

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
        $monIbu = new model\MonitorIbu();

        $like = App::instance()->input->get('q');
        $offset = App::instance()->input->get('page', 0);

        $limit = 10;
        $this->daftar_ibu = $monIbu->getMonitor($offset, $limit);
        $this->paging = $monIbu->paging($limit, $offset);
        $this->display("monitor_ibu/index.php");
    }

    public function tambah() {
        if (App::instance()->input->isPost()) {
            $monIbu = new model\MonitorIbu();
            $monIbu->attributes = $_POST;
            $monIbu->tanggal = date('Y-m-d', strtotime(App::instance()->input->post('tanggal')));
            if ($monIbu->save()) {
                $this->redirect('MonitorIbu');
            }
        }
        $this->display("monitor_ibu/form.php");
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
