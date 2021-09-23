<?php 
class Model_petugas{
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
    $this->query=mysqli_query($this->con,"select * from petugas");
    while($this->data=mysqli_fetch_array($this->query)){
        $this->result[]=$this->data;
    }
    return $this->result;
  }

  function POST($username, $password, $nama_petugas, $level){
    mysqli_query($this->con,"insert into petugas values(
        NULL,
        '".$username."',
        '".$password."',
        '".$nama_petugas."',
        '".$level."'
        )");
  }

  function GET_Where($id){
    $this->query=mysqli_query($this->con,"select * from petugas where id_petugas='$id'");
    while($this->data=mysqli_fetch_array($this->query)){
        $this->result[]=$this->data;
    }
    return $this->result;
  }

  function PUT($id_petugas, $username, $password, $nama_petugas, $level){
    $field_password = "";
    if(!empty($password)){
      $field_password = "password='".$password."',";
    }
    mysqli_query($this->con,"update petugas set
        username='".$username."',
        $field_password
        nama_petugas='".$nama_petugas."',
        level='".$level."'
        where id_petugas='".$id_petugas."'
    ");
  }

  function DELETE($id){
    mysqli_query($this->con,"delete from petugas where id_petugas='$id'");
  }

  function get_by_username($username){
    $this->query=mysqli_query($this->con,"select * from petugas where username='$username'");
    while($this->data=mysqli_fetch_array($this->query)){
        $this->result[]=$this->data;
    }
    return $this->result;
  }
}