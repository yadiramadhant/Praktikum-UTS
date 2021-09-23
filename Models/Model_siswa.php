<?php 
class Model_siswa{
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
    $this->query=mysqli_query($this->con,"select * from siswa");
    while($this->data=mysqli_fetch_array($this->query)){
        $this->result[]=$this->data;
    }
    return $this->result;
  }

  function POST($nisn, $nis, $nama, $id_kelas, $alamat, $no_telp, $id_spp){
    mysqli_query($this->con,"insert into siswa values(
        '".$nisn."',
        '".$nis."',
        '".$nama."',
        '".$id_kelas."',
        '".$alamat."',
        '".$no_telp."',
        '".$id_spp."'
        )");
  }

  function GET_Where($id){
    $this->query=mysqli_query($this->con,"select * from siswa where nisn='$id'");
    while($this->data=mysqli_fetch_array($this->query)){
        $this->result[]=$this->data;
    }
    return $this->result;
  }

  function PUT($nisn, $nis, $nama, $id_kelas, $alamat, $no_telp, $id_spp){
    mysqli_query($this->con,"update siswa set 
        nis='".$nis."',
        nama='".$nama."',
        id_kelas='".$id_kelas."',
        alamat='".$alamat."',
        no_telp='".$no_telp."',
        id_spp='".$id_spp."'
        where nisn='".$nisn."'
    ");
  }

  function DELETE($id){
    mysqli_query($this->con,"delete from siswa where nisn='$id'");
  }
}