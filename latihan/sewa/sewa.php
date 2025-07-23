<?php
  include 'koneksi.php';
  $query = mysqli_query($conn, "select * from kamar");
?>
<table border="2">
  <tr>
    <td>No</td>
    <td>Nomor Kamar</td>
    <td>Nama Kamar</td>
    <td>Harga</td>
    <td>Status</td>
    <td>Aksi</td>
  </tr>
  <?php
  $i = 1;
  while ($baris = mysqli_fetch_array($query)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td><?= $baris["nokamar"] ?></td>
      <td><?= $baris["namakamar"] ?></td>
      <td><?= $baris["harga"] ?></td>
      <td><?= $baris["status"] ?></td>
      <td><a href=sewaproses.php?nokamar=<?=$baris["nokamar"]?>>Booking</td>
    </tr>
  <?php endwhile ?>
</table>
<a href="kembali.php">Pengembalian</a>
