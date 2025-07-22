<?php

$conn = mysqli_connect("localhost", "root", "iyan9072", "multiinput");
if (mysqli_connect_errno()) {
    echo "Koneksi gagal".mysqli_connect_error();
}
$n = $_POST['jum2'];
for ($i = 1; $i <= $n; $i++) {
    $nim = $_POST['nim'.$i];
    $nama = $_POST['nama'.$i];
    $jurusan = $_POST['jurusan'.$i];
    $kelas = $_POST['kelas'.$i];
    if ((!empty($nim)) && (!empty($nama)) && (!empty($jurusan)) && (!empty($kelas))) {
        $query = mysqli_query($conn, "INSERT INTO mhs(nim,nama,jurusan,kelas) VALUES ('$nim','$nama','$jurusan','$kelas')");
    }
}
if ($query) {
    echo "<script>alert('Input Data Sukses');</script>";
} else {
    echo "<script>alert('Input Data Gagal');</script>";
}
?>
<html>
  <head>
    <title>Data Mahasiswa</title>
  </head>
  <body>
    <h2>Data Mahasiswa</h2>
    <table border="2">
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Kelas</th>
      </tr>
      <?php
      $no = 1;
$tampil = mysqli_query($conn, "SELECT * FROM mhs");
while ($mhs = mysqli_fetch_array($tampil)) { ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $mhs['nim'] ?></td>
        <td><?= $mhs['nama'] ?></td>
        <td><?= $mhs['jurusan'] ?></td>
        <td><?= $mhs['kelas'] ?></td>
      </tr>
      <?php } ?>
    </table><br>
    <a href="multi.html">
    <button type="button">Tambah</button>
    </a>
  </body>
</html>
