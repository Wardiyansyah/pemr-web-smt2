<?php
include 'koneksi.php';
$today=date("Ymd");
?>
<h1>Transaksi Pembayaran Tes</h1>
<p><a href="stok.php">Form Bayar Ruangan Tes</a></p>
<hr>
<?php
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$kapasitas = $_POST['kapasitas'];
$ruang = $_POST['ruang'];
$stokbaru = $kapasitas-1;
$query = mysqli_query($conn,"SELECT max(idtransaksi) AS last FROM transaksi WHERE idtransaksi LIKE '$today%'");
$data = mysqli_fetch_array($query);
$lastnotransaksi = $data['last'];
$lastnourut = substr($lastnotransaksi,8,4);
$nextnourut = intval($lastnourut)+1;
$nextnotransaksi = $today.sprintf('%04s',$nextnourut);
$query = mysqli_query($conn,"INSERT INTO transaksi(idtransaksi,kodetes,namapeserta) VALUES ('$nextnotransaksi','$kode','$nama')");
if($query){
	$query2 = mysqli_query($conn,"SELECT * FROM mastertes WHERE kodetes = '$kode'");
	$query3 = mysqli_query($conn,"update mastertes set kapasitas = '$stokbaru' where kodetes = '$kode'");
	$data2 = mysqli_fetch_array($query2);
?>
<p>Transaksi Pembayaran Tes Sukses</p>
Id Transaksi : <?php echo $nextnotransaksi;?><br>
Kode Tes : <?php echo $kode;?><br>
Nama Tes : <?php echo $data2['namates'];?><br>
Ruang : <?php echo $data2['ruang'];?><br>
Kapasitas : <?php echo $stokbaru;?><br>
Nama Peserta : <?php echo $nama;?><br>
<?php
}
else echo "Transaksi Gagal";
?>
