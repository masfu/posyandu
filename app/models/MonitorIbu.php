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

class MonitorIbu extends Model {

    public function __construct() {
        parent::__construct('monitor_ibu');
    }

    public function rules() {
        return array(
            array(
                'label' => 'Ibu id',
                'field' => 'id_ibu',
                'rules' => 'type:numeric|min:0|max:100|required:true|trim:true'),
            array(
                'label' => 'Usia Kandungan',
                'field' => 'usia_kandungan',
                'rules' => 'type:numeric|min:0|max:100|required:true|trim:true'),
            array(
                'label' => 'Berat Sebelum',
                'field' => 'berat_sebelum',
                'rules' => 'type:numeric|min:0|max:100|required:true|trim:true'),
            array(
                'label' => 'Berat Sesudah',
                'field' => 'berat_sesudah',
                'rules' => 'type:numeric|min:0|max:200|required:false|trim:true'),
            array(
                'label' => 'Keluhan',
                'field' => 'keluhan',
                'rules' => 'type:string|required:false|trim:true'),
            array(
                'label' => 'Asi',
                'field' => 'asi',
                'rules' => 'type:string|required:false|trim:true'),
            array(
                'label' => 'Rencana Lahir',
                'field' => 'rencana_lahir',
                'rules' => 'type:string|required:false|trim:true'),
            array(
                'label' => 'Tanggal',
                'field' => 'tanggal',
                'rules' => 'type:string|required:false|trim:true')
        );
    }

    public function getMonitor($limit, $offset) {
        return $this->findBySql("select i.*, (select nama from ibu where i.id_ibu = id) as nama from monitor_ibu i limit $limit, $offset")->All();
    }

    public function paging($limit, $offset) {
        $paging = new Pagination();

        $paging->baseUrl = App::instance()->base_url . 'MonitorIbu';
        $paging->total = $this->CountAll();
        $paging->current = $offset;
        $paging->limit = 10;
        return $paging->render();
    }

}
