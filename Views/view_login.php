<?php
  // Memanggil fungsi dari CSRF
  include('../Config/Csrf.php');
?>
<form action="../Config/Routes.php?function=post_login" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
    <tr>
        <td>Username</td>
        <td><input type="text" required name="username"></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" required name="password"></td>
    </tr>
    <tr>
        <td colspan="2" align="right"><input type="submit" name="proses" value="Login"></td>
    </tr>
</table
</form>
