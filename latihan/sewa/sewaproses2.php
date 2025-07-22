<?php
    include 'koneksi.php';
    $today = date ("Ymd");
    $vnokamar = trim($_POST['hiddennokamar']);
    $vharga = $_POST['hiddenharga'];
    $vjumlah = $_POST['txtjumlah'];
    $vtotal = (int)$vharga * (int)$vjumlah;
    $query = mysqli_query($conn,"SELECT max(idtransaksi) AS last FROM transaksi WHERE idtransaksi LIKE '$today%'");
    $data = mysqli_fetch_array($query);
    $lastnotransaksi = $data['last'];
    $lastnourut = substr($lastnotransaksi,8,4);
    $nextnourut = intval($lastnourut)+1;
    $nextnotransaksi = $today.sprintf('%04s',$nextnourut);
    $query = mysqli_query($conn,"INSERT INTO transaksi(idtransaksi,nokamar,lama,total) VALUES ('$nextnotransaksi','$vnokamar','$vjumlah','$vtotal')");
    if($query)
    {
    $query2 = mysqli_query($conn,"SELECT * FROM kamar WHERE nokamar = '$vnokamar'");
    $data2 = mysqli_fetch_array($query2);
    $vstatus = 'Tidak ada';
    $query3 = mysqli_query($conn,"update kamar set status='$vstatus' WHERE nokamar = '$vnokamar'");
?>
<p>Transaksi Sukses</p>
Transaksi : <?php echo $nextnotransaksi; ?> <br>
No. Kamar : <?php echo $data2['nokamar']; ?> <br>
Nama Kamar : <?php echo $data2['namakamar']; ?><br>
Harga Per Hari : <?php echo $data2['harga']; ?><br>
Lama Sewa : <?php echo $vjumlah; ?> <br>
Total Bayar : <?php echo $vtotal; ?> <br>
<?php
}
else echo "Transaksi Gagal";
?>
