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
use system\core\HttpException;
use app\moduls\CropImage;

class Ibu extends Controller {

    /**
     * constructor
     */
    public function __construct() {
        parent::__construct();
    }

    public function access() {
        return array(
            'index' => array('cache' => false, 'grant' => 'guest|admin'),
            'tambah' => array('cache' => false, 'grant' => 'guest|admin'),
            'hapus' => array('cache' => false, 'grant' => 'guest|admin'),
            'edit' => array('cache' => false, 'grant' => 'guest|admin')
        );
    }

    /**
     * index page
     * @access public
     */
    public function index() {
       // $this->startCache();

        $ibu = new model\Ibu();

        $like = App::instance()->input->get('q');
        $offset = App::instance()->input->get('page');
        $where = (isset($_GET['q'])) ? " nama LIKE '%" . $like . "%'" : '';
        $limit = 10;
        $this->daftar_ibu = $ibu->find()->where($where)->limit($limit, $offset)->All();
        $this->paging = $ibu->paging($limit, $offset);
        $this->display("ibu/index.php");
    }

    public function tambah() {
        if (!empty($_POST)) {

            $password = $this->input->post('password');
            $salt = $this->input->post('salt');

            $ibu = new model\Ibu();
            $ibu->attributes = $_POST;
            $ibu->tgl_lahir = date('Y-m-d', strtotime(App::instance()->input->post('tgl_lahir')));
            $ibu->password = crypt($password, $salt);
            $ibu->salt = $salt;

            if ($ibu->save()) {
                $this->redirect('Ibu');
            }
        }
        $this->display("ibu/form.php");
    }

    public function hapus($id) {
        if (is_numeric($id)) {
            $ibu = new model\Ibu();
            $ibu->id = $id;
            if ($ibu->delete()) {
                $this->redirect('Ibu');
            }
        }
    }

    public function edit($id = null) {
        if (is_numeric($id)) {
            $ibu = new model\Ibu();

            if (!empty($_POST)) {

                $password = $this->input->post('password');
                $salt = $this->input->post('salt');

                $ibu->attributes = $_POST;
                $ibu->id = $id;
                $ibu->tgl_lahir = date('Y-m-d', strtotime(App::instance()->input->post('tgl_lahir')));
                $ibu->password = crypt($password, $salt);
                $ibu->salt = $salt;
                if ($ibu->update()) {
                    $this->redirect('Ibu');
                }
            }
            $data = $ibu->findByPk($id)->All();
            if (!empty($data)) {
                $this->display("ibu/edit.php", reset($data));
            } else {
                throw new HttpException('Page not found', 404);
            }
        }
    }

    public function kartu($id = null) {
        $ibu = new model\Ibu();

        $data = $ibu->findByPk($id)->All();
        if (!empty($data)) {
            $this->display("ibu/kartu.php", reset($data));
        } else {
            throw new HttpException('Page not found', 404);
        }
    }

    public function uploadFoto() {
        $rawfoto = App::instance()->input->post('imgBase64');
        $id = App::instance()->input->post('id');
        $username = App::instance()->input->post('username');
        $ibu = new model\Ibu();

        $uncodedfoto = explode(',', $rawfoto);
        $foto = base64_decode($uncodedfoto[1]);

        $dir = DIR_APP . "/data/foto/";
        $name_file = $id . '_' . $username . '.png';
        $dest = $dir . $name_file;
        if (file_exists($dest)) {
            unlink($dest);
        }

        $fp = fopen($dest, 'w');
        fwrite($fp, $foto);
        fclose($fp);

        $crop = new CropImage($dest, $dest, 200, 200);
        $crop->resize_image();

        $ibu->id = $id;
        $ibu->foto = $name_file;
        if ($ibu->update(false)) {
            echo 'Berhasil menyimpan foto';
        } else {
            echo 'Gagal menyimpan foto';
        }

        $data = $ibu->findByPk($id)->All();
        $data = reset($data);
        $this->buatQRCode($data);
        $this->buatKartu($dest, $data);
    }

    function buatKartu($foto, $data) {
        $template = DIR_APP . "/data/kartu/template.jpg";
        $dest_kartu = DIR_APP . "/data/kartu/" . $data['id'] . '_' . $data['username'] . '.jpg';
        $qrcode_dir = DIR_APP . "/data/kartu/" . $data['id'] . '.png';
        $font = DIR_APP . "/data/kartu/arial.ttf";

        $background = imagecreatefromjpeg($template);
        $foto = imagecreatefromjpeg($foto);
        $qrcode = imagecreatefrompng($qrcode_dir);

        $lebar = imageSX($foto);
        $tinggi = imageSY($foto);
        $dst_width = 235;
        $dst_height = ($dst_width / $lebar) * $tinggi;
        $im = imagecreatetruecolor($dst_width, $dst_height);
        imagecopyresampled($im, $foto, 0, 0, 0, 0, $dst_width, $dst_height, $lebar, $tinggi);

        $lebar_qr = imageSX($qrcode);
        $tinggi_qr = imageSY($qrcode);
        $dst_width_qr = 200;
        $dst_height_qr = ($dst_width_qr / $lebar_qr) * $tinggi_qr;
        $im_qr = imagecreatetruecolor($dst_width_qr, $dst_height_qr);
        imagecopyresampled($im_qr, $qrcode, 0, 0, 0, 0, $dst_width_qr, $dst_height_qr, $lebar_qr, $tinggi_qr);

        imagefttext($background, 20, 0, 570, 320, 1, $font, ucwords($data['username']));
        imagefttext($background, 20, 0, 570, 390, 1, $font, $data['tgl_lahir']);
        imagefttext($background, 20, 0, 570, 440, 1, $font, $data['alamat']);

        imagecopymerge($background, $im, 50, 260, 0, 0, $dst_width, $dst_height, 100);
        imagecopymerge($background, $im_qr, 800, 250, 0, 0, $dst_width_qr, $dst_height_qr, 100);
        imagejpeg($background, $dest_kartu);
        imagedestroy($foto);
        imagedestroy($qrcode);
        imagedestroy($background);
    }

    private function buatQRCode($data) {
        App::import(DIR_APP . '/app/moduls/qrcode/qrlib.php');

        $dest = DIR_APP . '/data/kartu/' . $data['id'] . '.png';
        $codeText = base64_encode($data['id']);
        ob_start("callback");
        $debugLog = ob_get_contents();
        ob_end_clean();
        \QRcode::png($codeText, $dest);
    }

    public function cari() {
        $ibu = new model\Ibu();
        $like = App::instance()->input->get('q');
        $where = (isset($_GET['q'])) ? " nama LIKE '%" . $like . "%'" : '';
        $data = $ibu->find()->where($where)->limit(10)->All();
        echo $this->outputJson($data);
    }

}
