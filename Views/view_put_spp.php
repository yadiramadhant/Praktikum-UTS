<?php 
  include('../Config/Csrf.php');
  include '../Controllers/Controller_spp.php';
  $spp = new Controller_spp();
  $getSpp = $spp->GetData_Where($_GET['id_spp']);
?>



<?php
    foreach($getSpp as $get){
?>

<form action="../Config/Routes.php?function=put_spp" method="POST">
<input type="text" name="csrf_token" value="<?php echo CreateCSRF();?>"/>
<table border="1">
        <input type="hidden" name="id_spp" value="<?php echo $get['id_spp']; ?>">
    <tr>
        <td>Tahun</td>
        <td><input type="text" required name="tahun" value="<?php echo $get['tahun']; ?>"></td>
    </tr>
    <tr>
        <td>Nominal</td>
        <td><input type="text" required name="nominal" value="<?php echo $get['nominal']; ?>"></td>
    </tr>
    <tr>
        <td colspan="2" align="right"><input type="submit" name="proses" value="Create"></td>
    </tr>
</table
</form>

<?php
    }
?>