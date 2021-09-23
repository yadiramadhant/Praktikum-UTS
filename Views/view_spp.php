<?php 

include './layout_header.php';
include '../Controllers/Controller_spp.php';
 // Membuat Object dari Class pegawai
$spp = new Controller_spp();
$getSpp = $spp->GetData_All();
?>

  <h3>Table SPP</h3> <h3><a href="view_post_spp.php">Add Data</a></h3>

  <table border="1">
      <tr>
          <th>No</th>
          <th>Tahun</th>
          <th>Nominal</th>
          <th>Tools</th>
      </tr>
        <?php
          if(isset($getSpp))
          {
            $no = 1;
            foreach($getSpp as $spp){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $spp['tahun']; ?></td>
                <td><?php echo $spp['nominal']; ?></td>
                <td>
                    <a href="../Views/View_put_spp.php?id_spp=<?php echo $spp['id_spp'] ?>">view</a>
                    <a href="../Config/Routes.php?function=delete_spp&id_spp=<?php echo $spp['id_spp'] ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Delete</a>
                </td>
            </tr>
        <?php 
            }
          }
        ?>
  </table>

  