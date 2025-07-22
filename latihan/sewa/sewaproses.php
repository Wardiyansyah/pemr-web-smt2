<?php
include 'koneksi.php';
$query = mysqli_query($conn,"select * from kamar where nokamar ='$_GET[nokamar]'");
$data = mysqli_fetch_array ($query);
$vstatus = $data['status'];
if($vstatus=='Tidak ada') {
    echo "Kamar tidak ada <a href='sewa.php'>Kembali</a>";
} else { ?>
    <form method="post" action="sewaproses2.php">
        No Kamar : <?php echo $data['nokamar']; ?> <br>
        Nama Kamar : <?php echo $data['namakamar']; ?> <br>
        Harga per Hari : <?php echo $data['harga']; ?> <br>
        Lama Sewa (Hari) : <input type ="text" name="txtjumlah"><br>
        <?php $nokamar=$data['nokamar']; ?>
        <?php $vharga=$data['harga']; ?>
        <input type="hidden" name="hiddennokamar" value="<?php echo $nokamar?> ">
        <input type="hidden" name="hiddenharga" value="<?php echo $vharga?> ">
        <input type="submit" value="Submit">
    </form>
<?php } ?>
