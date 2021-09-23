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

  function GetData_All(){
    return $this->MSpp->GET();
  }

  function POSTData ($tahun, $nominal){
    $this->MSpp->POST($tahun, $nominal);
  }

  function GetData_Where ($id){
    return $this->MSpp->GET_Where($id);
  }

  function PUTData($id_spp, $tahun, $nominal){
    $this->MSpp->PUT($id_spp, $tahun, $nominal);
  }

  function DELETEData($id){
    $this->MSpp->DELETE($id);
  }
}