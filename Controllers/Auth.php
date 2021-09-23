<?php
class Controller_auth{
  var $db;
  var $con;
  var $query;
  var $data;
  var $result;

  function __construct()
  {
    include_once '../Models/Model_petugas.php';
    $this->auth = new Model_petugas();
  }

  function login($username, $password){
    $check = $this->auth->get_by_username($username);
    if(!empty($check)){
      $data = $check[0];
      if($data['password'] == $password){
        session_start();
        $_SESSION['id_petugas'] = $data['id_petugas'];
        return header("location:../views/view_petugas.php");
      }else{
        echo "Username atau Password salah";
      } 
    }else{
      echo "Username tidak terdaftar";
    }
  }

  function logout(){
    session_destroy();
  }
}