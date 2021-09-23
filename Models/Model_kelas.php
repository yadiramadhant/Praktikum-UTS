<?php 
class Model_kelas{
  // Property
  var $db;
  var $con;
  var $query;
  var $data;
  var $result;

  function __construct()
  {
    include_once '../Config/Database.php';
        $this->db = new Database();
        $this->con=$this->db->Connect();
  }

  function GET(){
    $this->query=mysqli_query($this->con,"select * from kelas");
    while($this->data=mysqli_fetch_array($this->query)){
        $this->result[]=$this->data;
    }
    return $this->result;
  }

  function POST($nama_kelas,$kompetensi_keahlian){
    mysqli_query($this->con,"insert into kelas values(
        NULL,
        '".$nama_kelas."',
        '".$kompetensi_keahlian."'
        )");
  }

  function GET_Where($id){
    $this->query=mysqli_query($this->con,"select * from kelas where id_kelas='$id'");
    while($this->data=mysqli_fetch_array($this->query)){
        $this->result[]=$this->data;
    }
    return $this->result;
  }

  function PUT ($id_kelas, $nama_kelas, $kompetensi_keahlian){
    mysqli_query($this->con,"update kelas set
        nama_kelas='".$nama_kelas."',
        kompetensi_keahlian='".$kompetensi_keahlian."'
        where id_kelas='".$id_kelas."'
    ");
  }

  function DELETE($id){
    mysqli_query($this->con,"delete from kelas where id_kelas='$id'");
  }
}