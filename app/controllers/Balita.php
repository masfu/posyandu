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

class Balita extends Controller {

    /**
     * constructor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * index page
     * @access public
     */
    public function index() {
        $balita = new model\Balita();
        $limit = 10;
        $like = App::instance()->input->get('q');
        $offset = App::instance()->input->get('page');
        $where = (isset($_GET['q'])) ? "'nama' LIKE '%" . $like . "%'" : '';

        $this->daftar_balita = $balita->find()->where($where)->limit($limit, $offset)->All();
        $this->paging = $balita->paging($limit, $offset);
        $this->display("balita/index.php");
    }

    public function tambah() {
        if (!empty($_POST)) {
            $balita = new model\Balita();
            $balita->attributes = $_POST;
            $balita->tgl_lahir = date('Y-m-d', strtotime(App::instance()->input->post('tgl_lahir')));
            if ($balita->save()) {
                $this->redirect('Balita');
            }
        }
        $this->display("balita/form.php");
    }

    public function hapus($id) {
        if (is_numeric($id)) {
            $balita = new model\Balita();
            $balita->id = $id;
            if ($balita->delete()) {
                $this->redirect('Balita');
            }
        }
    }

    public function edit($id = null) {
        if (is_numeric($id)) {
            $balita = new model\Balita();

            if (!empty($_POST)) {
                $balita->attributes = $_POST;
                $balita->id = $id;
                $balita->tgl_lahir = date('Y-m-d', strtotime(App::instance()->input->post('tgl_lahir')));
                if ($balita->update()) {
                    $this->redirect('Balita');
                }
            }
            $data = $balita->findByPk($id)->All();
            if (!empty($data)) {
                $this->display("balita/edit.php", reset($data));
            } else {
                throw new HttpException('Page not found', 404);
            }
        }
    }

    public function cari() {
        $ibu = new model\Balita();
        $like = App::instance()->input->get('q');
        $where = (isset($_GET['q'])) ? " nama LIKE '%" . $like . "%'" : '';
        $data = $ibu->find()->where($where)->limit(10)->All();
        echo $this->outputJson($data);
    }

}
