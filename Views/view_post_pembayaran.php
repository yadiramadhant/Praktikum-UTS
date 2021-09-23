<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');
  include '../Controllers/Controller_kelas.php';
  include '../Controllers/Controller_spp.php';

  $kelas = new Controller_kelas();
  $getKelas = $kelas->GetData_All();

  $spp = new Controller_spp();
  $getSpp = $spp->GetData_All();
?>
<form action="../Config/Routes.php?function=create_pembayaran" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<input type="text" name="csrf_token" value="<?= $_SESSION['id_petugas']?>"/>
<table border="1">
    <tr>
        <td>NISN <?= date("d", strtotime("2021-09-23")) ?></td>
        <td><input type="text" required name="nisn"></td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td><input type="date" required name="tanggal"></td>
        <tr>
    </tr>
        <td>SPP</td>
        <td>
            <select name="id_spp">
            <?php foreach($getSpp as $spp){ ?>
                <option value="<?= $spp['id_spp'] ?>"><?= $spp['tahun'] ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Jumlah</td>
        <td><input type="number" required name="jumlah_bayar"></td>
    </tr>
    <tr>
        <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
    </tr>
</table
</form>
