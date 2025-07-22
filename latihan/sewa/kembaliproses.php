<?php
include 'koneksi.php';
$vnokamar=$_POST['cbkamar'];
$query = mysqli_query($conn,"SELECT * FROM kamar WHERE nokamar = '$vnokamar'");
$data = mysqli_fetch_array($query);
?>
	<form method="post" action ="kembaliproses2.php">
	No Kamar : <?php echo $vnokamar ?><br>
	Nama Kamar : <?php echo $data['namakamar'];?><br>
	Denda : Rp. <input type="text" name="txtdenda"><br>
	<?php $vnokamar=$data['nokamar']; ?>
	<?php $vharga=$data['harga']; ?>
	<input type="hidden" name="hiddennokamar" value="<?php echo $vnokamar?>">
	<input type="submit" value="Submit">
	</form>
