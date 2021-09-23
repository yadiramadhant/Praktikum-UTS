<?php 

include './layout_header.php';
include '../Controllers/Controller_petugas.php';
 
$petugas = new Controller_petugas();
$getPetugas = $petugas->GetData_All();
session_start();
?>

  <h3>Table Petugas</h3> <h3><a href="view_post_petugas.php">Add Data</a></h3>

  <table border="1">
      <tr>
          <th>No</th>
          <th>Username</th>
          <th>Nama Petugas</th>
          <th>Level</th>
          <th>Tools</th>
      </tr>
        <?php
          if(isset($getPetugas))
          {
            $no = 1;
            foreach($getPetugas as $petugas){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $petugas['username']; ?></td>
                <td><?php echo $petugas['nama_petugas']; ?></td>
                <td><?php echo $petugas['level']; ?></td>
                <td>
                    <a href="../Views/View_put_petugas.php?id_petugas=<?php echo $petugas['id_petugas'] ?>">view</a>
                    <a href="../Config/Routes.php?function=delete_petugas&id_petugas=<?php echo $petugas['id_petugas'] ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Delete</a>
                </td>
            </tr>
        <?php 
            }
          }
        ?>
  </table>

  