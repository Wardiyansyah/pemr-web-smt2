<?php
include 'koneksi.php';
$today=date("Ymd");
?>
<h1>Transaksi Sewa Kamar</h1>
<p><a href="kembali.php">Form Sewa Kamar</a></p>
<hr>
<?php
$vnokamar = trim($_POST['hiddennokamar']);
$vdenda = trim($_POST['txtdenda']);
$query = mysqli_query($conn,"SELECT max(idtransaksi) AS last FROM transaksikamar WHERE idtransaksi LIKE '$today%'");
$data = mysqli_fetch_array($query);
$lastnotransaksi = $data['last'];
$lastnourut = substr($lastnotransaksi,8,4);
$nextnourut = intval($lastnourut)+1;
$nextnotransaksi = $today.sprintf('%04s',$nextnourut);
$query = mysqli_query($conn,"INSERT INTO transaksikamar(idtransaksi,nokamar,denda) VALUES ('$nextnotransaksi','$vnokamar','$vdenda')");
if($query)
{
	$query2 = mysqli_query($conn,"SELECT * FROM kamar WHERE nokamar = '$vnokamar'");
	$data2 = mysqli_fetch_array($query2);
	$vstatus='Ada';
	$query3 = mysqli_query($conn,"update kamar set status='$vstatus' WHERE nokamar = '$vnokamar'");
?>
<p>Transaksi Pengembalian Kamar Sukses</p>
Id Transaksi : <?php echo $nextnotransaksi;?><br>
No Kamar <?php echo $vnokamar;?><br>
Nama Kamar : <?php echo $data2['namakamar'];?><br>
Denda : <?php echo $vdenda;?><br>
<?php
}
else echo "Transaksi Gagal";
?>
<a href="kembali.php">Kembali</a>
