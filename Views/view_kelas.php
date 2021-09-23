<?php 

include './layout_header.php';
include '../Controllers/Controller_kelas.php';
 // Membuat Object dari Class pegawai
$kelas = new Controller_kelas();
$getKelas = $kelas->GetData_All();
?>


  <h3>Table Kelas</h3> <h3><a href="view_post_kelas.php">Add Data</a></h3>

  <table border="1">
      <tr>
          <th>No</th>
          <th>Nama Kelas</th>
          <th>Kompetensi Keahlian</th>
          <th>Tools</th>
      </tr>
        <?php
          if(isset($getKelas))
          {
            $no = 1;
            foreach($getKelas as $Get){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $Get['nama_kelas']; ?></td>
                <td><?php echo $Get['kompetensi_keahlian']; ?></td>
                <td>
                    <a href="../Views/View_put_kelas.php?id_kelas=<?php echo $Get['id_kelas'] ?>">view</a>
                    <a href="../Config/Routes.php?function=delete_kelas&id_kelas=<?php echo $Get['id_kelas'] ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Delete</a>
                </td>
            </tr>
        <?php 
            }
          }
        ?>
  </table>

  