<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');
  include '../Controllers/Controller_kelas.php';
  include '../Controllers/Controller_spp.php';
  include '../Controllers/Controller_siswa.php';

  $kelas = new Controller_kelas();
  $getKelas = $kelas->GetData_All();

  $spp = new Controller_spp();
  $getSpp = $spp->GetData_All();

  $siswa = new Controller_siswa();
  $getSiswa = $siswa->GetData_Where($_GET['nisn'])[0];
?>
<form action="../Config/Routes.php?function=put_siswa" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
    <tr>
        <td>NISN</td>
        <td><input type="text" required name="nisn" value="<?= $getSiswa['nisn'] ?>"></td>
    </tr>
    <tr>
        <td>NIS</td>
        <td><input type="text" required name="nis" value="<?= $getSiswa['nisn'] ?>"></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><input type="text" required name="nama" value="<?= $getSiswa['nama'] ?>"></td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>
            <select name="id_kelas" required>
                <?php foreach($getKelas as $kelas){ ?>
                <option value="<?= $kelas['id_kelas'] ?>" <?php ($kelas['id_kelas'] == $getSiswa['id_kelas']) ? print_r("selected") : print_r("") ?>><?= $kelas['nama_kelas'] ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><input type="text" required name="alamat" value="<?= $getSiswa['alamat'] ?>"></td>
    </tr>
    <tr>
        <td>Nomor Telepon</td>
        <td><input type="text" required name="no_telp" value="<?= $getSiswa['no_telp'] ?>"></td>
    </tr>
    <tr>
        <td>SPP</td>
        <td>
            <select name="id_spp">
            <?php foreach($getSpp as $spp){ ?>
                <option value="<?= $spp['id_spp'] ?>" <?php ($spp['id_spp'] == $getSiswa['id_spp']) ? print_r("selected") : print_r("") ?>><?= $spp['tahun'] ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
    </tr>
</table
</form>
