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

class MonitorBalita extends Model {

    public function __construct() {
        parent::__construct('monitor_balita');
    }

    public function rules() {
        return array(
            array(
                'label' => 'Id Balita',
                'field' => 'id_balita',
                'rules' => 'type:numeric|min:0|max:100|required:true|trim:true'),
            array(
                'label' => 'Umur',
                'field' => 'umur',
                'rules' => 'type:string|min:0|max:100|required:true|trim:true'),
            array(
                'label' => 'Berat',
                'field' => 'berat',
                'rules' => 'type:string|min:0|max:3|required:true|trim:true'),
            array(
                'label' => 'Tinggi',
                'field' => 'tinggi',
                'rules' => 'type:string|min:0|max:3|required:true|trim:true'),
            array(
                'label' => 'Bicara',
                'field' => 'bicara',
                'rules' => 'type:string|required:false|trim:true'),
            array(
                'label' => 'Bicara',
                'field' => 'bicara',
                'rules' => 'type:string|required:false|trim:true'),
            array(
                'label' => 'Tanggal',
                'field' => 'tanggal',
                'rules' => 'type:string|required:false|trim:true')
        );
    }

    public function getMonitor($limit, $offset, $bulan, $tahun) {
        return $this->findBySql("select i.*, (select nama from balita where i.id_balita = id) as nama from monitor_balita i where month(tanggal) = '$bulan' and year(tanggal) = '$tahun' limit $limit, $offset")->All();
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
