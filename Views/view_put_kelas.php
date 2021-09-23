<?php 
  include('../Config/Csrf.php');
  include '../Controllers/Controller_kelas.php';
  $kelas = new Controller_kelas();
  $getKelas = $kelas->GetData_Where($_GET['id_kelas']);
?>



<?php
    foreach($getKelas as $get){
?>

<form action="../Config/Routes.php?function=put_kelas" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
        <input type="hidden" name="id_kelas" value="<?php echo $get['id_kelas']; ?>">
    <tr>
        <td>Nama</td>
        <td><input type="text" required name="nama_kelas" value="<?php echo $get['nama_kelas']; ?>"></td>
    </tr>
    <tr>
        <td>Kompetensi Kehlian</td>
        <td><input type="text" required name="kompetensi_keahlian" value="<?php echo $get['kompetensi_keahlian']; ?>"></td>
    </tr>
    <tr>
        <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
    </tr>
</table
</form>

<?php
    }
?>