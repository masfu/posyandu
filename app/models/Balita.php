<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of Balita
 *
 * @author masfu
 */
use \App;
use system\db\Model;
use system\helper\Pagination;

class Balita extends Model {

    public function __construct() {
        parent::__construct('balita');
    }

    public function rules() {
        return array(
            array(
                'label' => 'Nama',
                'field' => 'nama',
                'rules' => 'type:string|min:5|max:100|required:true|trim:true'),
            array(
                'label' => 'Ibu',
                'field' => 'ibu',
                'rules' => 'type:string|min:0|max:100|required:true|trim:true'),
            array(
                'label' => 'Tanggal Lahir',
                'field' => 'tgl_lahir',
                'rules' => 'type:string|min:6|max:100|required:true|trim:true'),
            array(
                'label' => 'Alamat',
                'field' => 'alamat',
                'rules' => 'type:string|min:0|max:200|required:false|trim:true'),
            array(
                'label' => 'Berat Lahir',
                'field' => 'tgl_lahir',
                'rules' => 'type:number|min:0|max:3|required:true|trim:true'),
            array(
                'label' => 'Tinggi Lahir',
                'field' => 'tinggi_lahir',
                'rules' => 'type:number|min:0|max:3|required:true|trim:true'),
            array(
                'label' => 'Cacat Lahir',
                'field' => 'cacat_lahir',
                'rules' => 'type:string|min:0|max:100|required:false|trim:true'),
            array(
                'label' => 'Jenis Kelamin',
                'field' => 'jenis_kelamin',
                'rules' => 'type:string|min:0|max:45|required:true|trim:true'),
            array(
                'label' => 'Ibu id',
                'field' => 'ibu_id',
                'rules' => 'type:number|min:0|max:50|required:true|trim:true'),
            array(
                'label' => 'Anak ke',
                'field' => 'anak_ke',
                'rules' => 'type:string|required:false|trim:true')
        );
    }

    public function paging($limit, $offset) {
        $paging = new Pagination();

        $paging->baseUrl = App::instance()->base_url . 'Balita';
        $paging->total = $this->CountAll();
        $paging->current = $offset;
        $paging->limit = $limit;
        return $paging->render();
    }

}
