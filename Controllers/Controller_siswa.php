<?php
class Controller_siswa{
  var $db;
  var $con;
  var $query;
  var $data;
  var $result;

  function __construct()
  {
    include '../Models/Model_siswa.php';
    $this->MSiswa = new Model_siswa();
  }

  function GetData_All(){
    return $this->MSiswa->GET();
  }

  function POSTData ($nisn, $nis, $nama, $id_kelas, $alamat, $no_telp, $id_spp){
    $this->MSiswa->POST($nisn, $nis, $nama, $id_kelas, $alamat, $no_telp, $id_spp);
  }

  function GetData_Where ($id){
    return $this->MSiswa->GET_Where($id);
  }

  function PUTData($nisn, $nis, $nama, $id_kelas, $alamat, $no_telp, $id_spp){
    $this->MSiswa->PUT($nisn, $nis, $nama, $id_kelas, $alamat, $no_telp, $id_spp);
  }

  function DELETEData($id){
    $this->MSiswa->DELETE($id);
  }
}