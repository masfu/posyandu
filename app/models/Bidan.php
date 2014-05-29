<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of Pkk
 *
 * @author masfu
 */
use \App;
use system\db\Model;
use system\helper\Pagination;

class Bidan extends Model {

    public function __construct() {
        parent::__construct('bidan');
    }

    public function rules() {
        return array(
            array(
                'label' => 'Nama',
                'field' => 'nama',
                'rules' => 'type:string|min:5|max:100|required:true|trim:true'),
            array(
                'label' => 'Username',
                'field' => 'username',
                'rules' => 'type:string|min:0|max:100|required:true|trim:true|unique'),
            array(
                'label' => 'Password',
                'field' => 'password',
                'rules' => 'type:string|min:6|max:100|required:true|trim:true'),
            array(
                'label' => 'Alamat',
                'field' => 'alamat',
                'rules' => 'type:string|min:0|max:200|required:false|trim:true'),
            array(
                'label' => 'Tanggal Lahir',
                'field' => 'tgl_lahir',
                'rules' => 'type:string|required:false|trim:true'));
    }

    public function paging($limit, $offset) {
        $paging = new Pagination();

        $paging->baseUrl = App::instance()->base_url . 'Pkk';
        $paging->total = $this->CountAll();
        $paging->current = $offset;
        $paging->limit = $limit;
        return $paging->render();
    }

}
