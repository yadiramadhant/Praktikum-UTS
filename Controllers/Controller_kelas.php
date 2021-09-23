<?php
class Controller_kelas{
  var $db;
  var $con;
  var $query;
  var $data;
  var $result;

  function __construct()
  {
    include '../Models/Model_kelas.php';
    $this->MKelas = new Model_kelas();
  }

  function GetData_All(){
    return $this->MKelas->GET();
  }

  function POSTData ($nama_kelas, $kompetensi_keahlian){
    $this->MKelas->POST($nama_kelas, $kompetensi_keahlian);
  }

  function GetData_Where ($id){
    return $this->MKelas->GET_Where($id);
  }

  function PUTData($id_kelas, $nama_kelas, $kompetensi_keahlian){
    $this->MKelas->PUT($id_kelas, $nama_kelas, $kompetensi_keahlian);
  }

  function DELETEData($id){
    $this->MKelas->DELETE($id);
  }


}