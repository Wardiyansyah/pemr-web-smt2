<?php
include 'koneksi.php';
?>
<h1>Transaksi Pembayaran</h1>
<p><a href="bayar.php">Form Bayar</a></p>
<hr>
<?php
$id = $_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM member WHERE idmember = '$id'");
if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_array($query);
    ?>
	<form method="post" action ="proses2.php">
	Id Member : <?php echo $id; ?><br>
	Nama : <?php echo $data['nama'];?><br>
	Alamat : <?php echo $data['alamat']?><br>
	Jumlah Bayar : Rp. <input type="text" name="jumlah">
	<input type="hidden" name="id" value="<?= $id ?>">
	<input type="submit" name="submit" value="Submit">
	</form>
	<?php
} else {
    echo "Nomor ID tidak ditemukan";
}
?>
