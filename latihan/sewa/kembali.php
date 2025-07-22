<h2>Transaksi Pengembalian</h2>
<form action="kembaliproses.php" method="post">
Nomor Kamar : <select name="cbkamar">
<?php
include 'koneksi.php';
$query = mysqli_query($conn,"select * from kamar");
while($baris=mysqli_fetch_array($query))
{
echo "<option value='$baris[0]'>$baris[0]</option>";
}
?>
</select>
<input type="submit" value="Submit">
</form>
