<?php 
  include './layout_header.php';
  include '../Controllers/Controller_siswa.php';
 
  $siswa = new Controller_siswa();
  $getSiswa = $siswa->GetData_All();
?>

  <h3>Table Siswa</h3> <h3><a href="view_post_siswa.php">Add Data</a></h3>
  <table border="1">
      <tr>
          <th>No</th>
          <th>NISN</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Alamat</th>
          <th>No. telp</th>
          <th>SPP Tahun</th>
          <!-- <th>Nominal</th>
          <th>Tools</th> -->
      </tr>
        <?php
          if(isset($getSiswa))
          {
            $no = 1;
            foreach($getSiswa as $siswa){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $siswa['nisn']; ?></td>
                <td><?php echo $siswa['nis']; ?></td>
                <td><?php echo $siswa['nama']; ?></td>
                <td><?php echo $siswa['id_kelas']; ?></td>
                <td><?php echo $siswa['alamat']; ?></td>
                <td><?php echo $siswa['no_telp']; ?></td>
                <!-- <td>-spp tahun-</td>
                <td>-spp nominal-</td> -->
                <td>
                    <a href="../Views/View_put_siswa.php?nisn=<?php echo $siswa['nisn'] ?>">view</a>
                    <a href="../Config/Routes.php?function=delete_siswa&nisn=<?php echo $siswa['nisn'] ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Delete</a>
                </td>
            </tr>
        <?php 
            }
          }
        ?>
  </table>

  