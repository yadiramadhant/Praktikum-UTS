<?php
class Controller_petugas{
  var $db;
  var $con;
  var $query;
  var $data;
  var $result;

  function __construct()
  {
    include '../Models/Model_petugas.php';
    $this->MPetugas = new Model_petugas();
  }

  function GetData_All(){
    return $this->MPetugas->GET();
  }

  function POSTData ($username, $password, $nama_petugas, $level){
    $this->MPetugas->POST($username, $password, $nama_petugas, $level);
  }

  function GetData_Where ($id){
    return $this->MPetugas->GET_Where($id);
  }

  function PUTData($id_petugas, $username, $password, $nama_petugas, $level){
    $this->MPetugas->PUT($id_petugas, $username, $password, $nama_petugas, $level);
  }

  function DELETEData($id){
    $this->MPetugas->DELETE($id);
  }
}