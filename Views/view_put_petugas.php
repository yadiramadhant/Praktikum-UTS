<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');
  include '../Controllers/Controller_petugas.php';
  $petugas = new Controller_petugas();
  $getPetugas = $petugas->GetData_Where($_GET['id_petugas'])[0];
?>
<form action="../Config/Routes.php?function=put_petugas" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
    <input type="hidden" name="id_petugas" value="<?php echo $getPetugas['id_petugas']; ?>">
    <tr>
        <td>Username</td>
        <td><input type="text" required name="username" value="<?php echo $getPetugas['username']; ?>"></td>
    </tr>
    <tr>
        <td>Password</td>
        <td>
          <input type="password" name="password" value="">
          <label>*Isi password apabila ingin mengganti password</label>
        </td>
    </tr>
    <tr>
        <td>Nama Petugas</td>
        <td><input type="text" required name="nama_petugas" value="<?php echo $getPetugas['nama_petugas']; ?>"></td>
    </tr>
    <tr>
        <td>Level</td>
        <td>
            <select name="level">
                <option value="Administrator" <?php ($getPetugas['level'] == "Administrator") ? print_r("selected") : print_r("") ?>>Administrator</option>
                <option value="Petugas" <?php ($getPetugas['level'] == "Petugas") ? print_r("selected") : print_r("") ?>>Petugas</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
    </tr>
</table
</form>
