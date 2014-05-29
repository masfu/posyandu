<?php

namespace app\moduls;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of K-means
 *
 * @author Masfu Hisyam
 */
class Kmeans {

    //jumlah cluster
    var $cluster_count;
    //data member
    var $data = array();
    //untuk menyimpan nilai cluster
    var $cluster = array(array());
    //untuk menyimpan data member setiap cluster
    var $cluster_member = array(array());
    var $cluster_log = array();

    public function __construct() {
        $this->cluster_count = 0;
        $this->data = array();
    }

    public function init_centroid_val() {

        $max = array();
        $min = array();

        //inisialisasi array 
        foreach ($this->data[0] as $key => $value) {
            if ($key != 'id') {
                $max[$key] = 0;
                $min[$key] = 0;
            }
        }

        //menentukan nilai maximal dan nilai minimal
        foreach ($this->data as $baris) {

            foreach ($baris as $key => $kolom) {
                if ($key != 'id') {
                    //cari nilai maximum data
                    if ($kolom > $max[$key]) {
                        $max[$key] = $kolom;
                    }

                    //cari nilai minimum data
                    if ($kolom < $min[$key]) {
                        $min[$key] = $kolom;
                    }
                }
            }
        }


        //membangkitkan centroid
        for ($i = 0; $i < $this->cluster_count; $i++) {
            $j = 0;
            foreach ($max as $key => $val) {

                //cari centroid awal
                $int = ($i != 0) ? abs($min[$key] - $max[$key]) / $i : 0;
                $this->cluster[$i][$key] = $min[$key] + $int * $i;
                $this->cluster_member[$i] = array();
                $j++;
            }
        }
    }

    //menghitung jarak dengan euclidean distance d=sqrt(pow(x1-x2));
    public function distance($data1, $data2) {
        $dis = 0;
        //hitung dengan rumus pow(x1 - x2, 2) + .... +pow(xn - xn, 2)
        foreach ($data1 as $key => $value) {
            $dis += pow(abs($value - $data2[$key]), 2);
        }
        //akar kuadrat 
        return sqrt($dis);
    }

    public function calculate_cluster() {


        foreach ($this->data as $i => $baris) {

            $jarak_terdekat = 1000000;
            $cluster_terdekat = 0;

            foreach ($this->cluster as $j => $value) {

                //jika ada kolom id maka hapus kolom tersebut
                if ($j == 'id')
                    $cluster = array_slice($baris, 1);

                //hitung jarak dengan rumus euclidean distance
                $jarak = $this->distance($cluster, $value);

                //jika jarak lebih kecil maka itu adalah centroidnya
                if ($jarak_terdekat > $jarak) {
                    $jarak_terdekat = $jarak;
                    $cluster_terdekat = $j;
                }
            }
            //assign member ke setiap centroid
            $this->cluster_member[$cluster_terdekat][$i] = $baris;
        }
    }

    public function average_cluster() {
        $avg_cluster = $this->cluster;

        $jum_member_cluster = array();

        $diff = 0;

        //inisialisasi array
        foreach ($this->cluster as $i => $val) {
            foreach ($val as $j => $value) {
                $avg_cluster[$i][$j] = 0;
            }
        }
        //menjumhlahkan nilai tiap member cluster
        foreach ($this->cluster_member as $i => $member) {

            //untuk setiap member di setiap cluster
            foreach ($member as $j => $member_value) {

                //menghitung total
                foreach ($member_value as $k => $value) {
                    if ($k != 'id') {
                        $avg_cluster[$i][$k] += $value;
                    }
                }
            }
            //assign jumlah member tiap cluster;
            $jum_member_cluster[$i] = count($member);
        }

        //setelah dihitung total kemudian dibagi jumlah data;
        foreach ($avg_cluster as $i => $val) {
            foreach ($val as $j => $value) {
                if ($value == 0)
                    $avg_cluster[$i][$j] = 0;
                else
                    $avg_cluster[$i][$j] = round($avg_cluster[$i][$j] / $jum_member_cluster[$i], 3);
            }
        }

        //bandingkan centroid awal dengan centroid rata-rata
        foreach ($this->cluster as $i => $value) {
            $diff += count(array_diff($avg_cluster[$i], $value));
            $this->cluster[$i] = $avg_cluster[$i];
        }
        return $diff;
    }

    public function do_cluster() {

        //nilai perbedaan centroid awal dengan centroid baru
        $diff = 0;

        //inisialisasi nilai centroid awal
        $this->init_centroid_val();

        do {

            $this->cluster_log[] = $this->cluster;
            //kelompokkan data sesuai dengan centroid terdekat
            $this->calculate_cluster();

            //hitung rata-rata data setiap cluster 
            //kemudian hitung perbedaanx antara centroid awal dengan centroid baru
            $diff = $this->average_cluster();
        } while ($diff > 0);
    }

}

/* $cluster->do_cluster();

  echo "<br>";
  foreach ($cluster->cluster_member as $key => $val) {
  echo "cluster ke " . $key . "  = " . print_r($cluster->cluster[$key], true) . " <br><hr>";
  foreach ($val as $value) {

  echo print_r($value, true) . "<br>";
  }
  echo "<br>";
  }
  echo "<br>";
  echo "centroid akhir";
  foreach ($cluster->cluster as $i => $value) {
  echo print_r($value, true) . "<br>";
  } */
?>
