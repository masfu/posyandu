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

class Pkk extends Controller {

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
        $bidan = new model\Bidan();
        $like = App::instance()->input->get('q');
        $offset = App::instance()->input->get('page');
        $where = (isset($_GET['q'])) ? "'nama' LIKE '%" . $like . "%'" : '';
        $limit = 10;

        $this->daftar_pkk = $bidan->find()->where($where)->limit($limit, $offset)->All();
        $this->paging = $bidan->paging($limit, $offset);

        $this->display("bidan/index.php");
    }

    public function tambah() {
        if (!empty($_POST)) {
            $password = $this->input->post('password');
            $salt = $this->input->post('salt');

            $bidan = new model\Bidan();
            $bidan->attributes = $_POST;
            $bidan->tgl_lahir = date('Y-m-d', strtotime(App::instance()->input->post('tgl_lahir')));
            $bidan->password = crypt($password, $salt);
            $bidan->salt = $salt;
            if ($bidan->save()) {
                $this->redirect('Pkk');
            }
        }
        $this->display("bidan/form.php");
    }

    public function hapus($id) {
        if (is_numeric($id)) {
            $bidan = new model\Bidan();
            $bidan->id = $id;
            if ($bidan->delete()) {
                $this->redirect('Pkk');
            }
        }
    }

    public function edit($id = null) {
        if (is_numeric($id)) {
            $bidan = new model\Bidan();

            if (!empty($_POST)) {
                $password = $this->input->post('password');
                $salt = $this->input->post('salt');

                $bidan->attributes = $_POST;
                $bidan->id = $id;
                $bidan->tgl_lahir = date('Y-m-d', strtotime(App::instance()->input->post('tgl_lahir')));
                $bidan->password = crypt($password, $salt);
                $bidan->salt = $salt;
                if ($bidan->update()) {
                    $this->redirect('Pkk');
                }
            }
            $data = $bidan->findByPk($id)->All();
            if (!empty($data)) {
                $this->display("bidan/edit.php", reset($data));
            } else {
                throw new HttpException('Page not found', 404);
            }
        }
    }

    public function cari() {
        $bidan = new model\Bidan();
        $like = App::instance()->input->get('q');
        $where = (isset($_GET['q'])) ? " 'nama' LIKE '%" . $like . "%'" : '';
        $criteria = array('limit' => 10,
            'where' => $where);

        $data = $bidan->find($criteria);
        echo $this->outputJson($data);
    }

}
