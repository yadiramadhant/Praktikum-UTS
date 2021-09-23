<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');
?>
<form action="../Config/Routes.php?function=create_petugas" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
    <tr>
        <td>Username</td>
        <td><input type="text" required name="username"></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="text" required name="password"></td>
    </tr>
    <tr>
        <td>Nama Petugas</td>
        <td><input type="text" required name="nama_petugas"></td>
    </tr>
    <tr>
        <td>Level</td>
        <td>
            <select name="level">
                <option value="administrator">Administrator</option>
                <option value="petugas">Petugas</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
    </tr>
</table
</form>
