<?php 
class Model_spp{
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
    $this->query=mysqli_query($this->con,"select * from spp");
    while($this->data=mysqli_fetch_array($this->query)){
        $this->result[]=$this->data;
    }
    return $this->result;
  }

  function POST($tahun,$nominal){
    mysqli_query($this->con,"insert into spp values(
        NULL,
        '".$tahun."',
        '".$nominal."'
        )");
  }

  function GET_Where($id){
    $this->query=mysqli_query($this->con,"select * from spp where id_spp='$id'");
    while($this->data=mysqli_fetch_array($this->query)){
        $this->result[]=$this->data;
    }
    return $this->result;
  }

  function PUT($id_spp, $tahun, $nominal){
    mysqli_query($this->con,"update spp set
        tahun='".$tahun."',
        nominal='".$nominal."'
        where id_spp='".$id_spp."'
    ");
  }

  function DELETE($id){
    mysqli_query($this->con,"delete from spp where id_spp='$id'");
  }
}