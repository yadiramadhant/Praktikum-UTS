<?php

  // Memanggil fungsi dari CSRF
  include('Csrf.php');


include '../Controllers/Controller_Pegawai.php';
include '../Controllers/Controller_kelas.php';
include '../Controllers/Controller_spp.php';
include '../Controllers/Controller_siswa.php';
include '../Controllers/Controller_petugas.php';
include '../Controllers/Auth.php';
include '../Controllers/Controller_pembayaran.php';
 
$db = new Controller_pegawai();
$dbKelas = new Controller_kelas();
$dbSpp = new Controller_spp();
$dbSiswa = new Controller_siswa();
$dbPetugas = new Controller_petugas();
$dbAuth = new Controller_auth();
$dbPembayaran = new Controller_pembayaran();

// Membuat variabel dari Get URL
$function = $_GET['function'];

// Decision variabel create
if($function == "create_pegawai"){
    // Validasi Token CSRF
    if(validation()==true)
    {
        $db->POSTData(
            $_POST['nip'],
            $_POST['nama'],
            $_POST['jns_kel'],
            $_POST['tgl_lahir'],
            $_POST['status'],
            $_POST['mulai_kerja']
        );
    }
    header("location:../Views/View_pegawai.php");
}
// Decision variabel put
elseif($function == "put_pegawai"){

    // Validasi Token CSRF
    if(validation()==true)
    {
        $db->PUTData(
            $_POST['nip'],
            $_POST['nama'],
            $_POST['jns_kel'],
            $_POST['tgl_lahir'],
            $_POST['status'],
            $_POST['mulai_kerja']
        );   
    }
    header("location:../Views/View_pegawai.php");
}
// Decision variabel delete
elseif($function == "delete_pegawai"){
    $db->DELETEData($_GET['nip']);
    header("location:../Views/View_pegawai.php");
}
elseif($function == "create_kelas"){ // kelas
    // Validasi Token CSRF
    if(validation()==true)
    {
        $dbKelas->POSTData(
            $_POST['nama_kelas'],
            $_POST['kompetensi_keahlian']
        );
    }
    header("location:../Views/View_kelas.php");
}
elseif($function == "put_kelas"){
    // Validasi Token CSRF
    if(validation()==true)
    {
        $dbKelas->PUTData(
            $_POST['id_kelas'],
            $_POST['nama_kelas'],
            $_POST['kompetensi_keahlian']
        );   
    }
    header("location:../Views/View_kelas.php");
}
elseif($function == "delete_kelas"){
    $dbKelas->DELETEData($_GET['id_kelas']);
    header("location:../Views/View_kelas.php");
}
elseif($function == "create_spp"){ // spp
    // Validasi Token CSRF
    if(validation()==true)
    {
        $dbSpp->POSTData(
            $_POST['tahun'],
            $_POST['nominal']
        );
    }
    header("location:../views/view_spp.php");
}
elseif($function == "put_spp"){
    // Validasi Token CSRF
    if(validation()==true)
    {
        $dbSpp->PUTData(
            $_POST['id_spp'],
            $_POST['tahun'],
            $_POST['nominal']
        );   
    }
    header("location:../views/view_spp.php");
}
elseif($function == "delete_spp"){
    $dbSpp->DELETEData($_GET['id_spp']);
    header("location:../views/view_spp.php");

}
elseif($function == "create_siswa"){ // siswa
    // Validasi Token CSRF
    if(validation()==true)
    {
        $dbSiswa->POSTData(
            $_POST['nisn'],
            $_POST['nis'],
            $_POST['nama'],
            $_POST['id_kelas'],
            $_POST['alamat'],
            $_POST['no_telp'],
            $_POST['id_spp']
        );
    }
    header("location:../views/view_siswa.php");
}
elseif($function == "put_siswa"){
    // Validasi Token CSRF
    if(validation()==true)
    {
        $dbSiswa->PUTData(
            $_POST['nisn'],
            $_POST['nis'],
            $_POST['nama'],
            $_POST['id_kelas'],
            $_POST['alamat'],
            $_POST['no_telp'],
            $_POST['id_spp']
        );   
    }
    header("location:../views/view_siswa.php");
}
elseif($function == "delete_siswa"){
    $dbSiswa->DELETEData($_GET['nisn']);
    header("location:../views/view_siswa.php");
}
elseif($function == "post_login"){ // petugas & Authentication
    // Validasi Token CSRF
    if(validation()==true)
    {
        $password = base64_encode($_POST['password']);
        $dbAuth->login(
            $_POST['username'],
            $password
        );
    }
    // header("location:../views/view_petugas.php");
}
elseif($function == "create_petugas"){
    // Validasi Token CSRF
    if(validation()==true)
    {
        $password = base64_encode($_POST['password']);
        $dbPetugas->POSTData(
            $_POST['username'],
            $password,
            $_POST['nama_petugas'],
            $_POST['level']
        );
    }
    header("location:../views/view_petugas.php");
}
elseif($function == "put_petugas"){
    // Validasi Token CSRF
    if(validation()==true)
    {
        $password = "";
        if(!empty($_POST['password'])){
            $password = base64_encode($_POST['password']);
        }

        $dbPetugas->PUTData(
            $_POST['id_petugas'],
            $_POST['username'],
            $password,
            $_POST['nama_petugas'],
            $_POST['level']
        );   
    }
    header("location:../views/view_petugas.php");
}
elseif($function == "delete_petugas"){
    $dbPetugas->DELETEData($_GET['id_petugas']);
    header("location:../views/view_petugas.php");
}
elseif($function == "create_pembayaran"){ // Pembayaran
    // Validasi Token CSRF
    if(validation()==true)
    {
        $date = $_POST['tanggal'];
        $tahun =  date("y", strtotime($date));
        $bulan =  date("m", strtotime($date));
        $tanggal =  date("d", strtotime($date));

        
        $dbPembayaran->POSTData(
            $_POST['id_petugas'],
            $_POST['nisn'],
            $tanggal,
            $bulan,
            $tahun,
            $_POST['id_spp'],
            $_POST['jumlah']
        );
    }
    header("location:../views/view_pembayaran.php");
}


?>