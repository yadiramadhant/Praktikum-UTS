<?php

// Class pegawai (CRUD pegawai)
class Controller_pegawai{

     // Property
     var $db;
     var $con;
     var $query;
     var $data;
     var $result;

     var $MPegawai;

     var $nip;
     var $nama;
     var $jns_kel;
     var $tgl_lahir;
     var $status;
     var $mulai_kerja;

     

     // Method main variabel
        function __construct()
        {
            // Membuat Object dari Class Module pegawai
            include '../Models/Model_pegawai.php';
            $this->MPegawai = new Model_pegawai();
        }




    // Method untuk memasukan data ke dalam table
    function POSTData ($nip,$nama,$jns_kel,$tgl_lahir,$status,$mulai_kerja){

        // perintah POST data
        $this->MPegawai->POST($nip,$nama,$jns_kel,$tgl_lahir,$status,$mulai_kerja);

    }



    
    // Method untuk mengambil semua data dari table
    function GetData_All(){

        // perintah GET data
        return $this->MPegawai->GET();
        

    }


    // Method untuk mengambil data seleksi dari table
    function GetData_Where ($nip){

        // perintah GET data
        return $this->MPegawai->GET_Where($nip);
    }




    // Method untuk memasukan data ke dalam table
    function PUTData ($nip,$nama,$jns_kel,$tgl_lahir,$status,$mulai_kerja){

        // perintah PUT data
        $this->MPegawai->PUT($nip,$nama,$jns_kel,$tgl_lahir,$status,$mulai_kerja);

    }




    // Method untuk menghapus data dari table
    function DELETEData ($nip){

        // perintah DELETE data
        $this->MPegawai->DELETE($nip);

    }


 


}


?>