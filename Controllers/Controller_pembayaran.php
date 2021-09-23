<?php
class Controller_spp{
  var $db;
  var $con;
  var $query;
  var $data;
  var $result;

  function __construct()
  {
    include '../Models/Model_spp.php';
    $this->MSpp = new Model_spp();
  }
  
  // function POSTData ($id_petugas, $nisn, $tgl_bayar, $bulan_bayar, $bulan_bayar, $tahun_bayar, $id_spp, $jumlah_bayar){
    function POSTData ($id_petugas, $nisn){
    $this->MSpp->POST($tahun, $nominal);
  }
}