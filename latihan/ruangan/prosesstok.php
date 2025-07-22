<?php
    include 'koneksi.php';
?>
<h1>Transaksi Pembayaran</h1>
<p><a href="stok.php">Form Bayar Ruangan</a></p>
<hr>
<?php
    $kode = $_POST['kode'];
    $query = mysqli_query($conn,"SELECT * FROM mastertes WHERE kodetes = '$kode'");
    if (mysqli_num_rows($query)>0){
        $data = mysqli_fetch_array($query);
?>
<form method="post" action ="prosesstok2.php">
    Kode Tes : <?php echo $kode; ?><br>
    Nama Tes : <?php echo $data['namates'];?><br>
    Ruangan : <?php echo $data['ruang']?><br>
    Kapasitas : <?php echo $data['kapasitas']?><br>
    Nama Peserta : <input type="text" name="nama">
    <input type="hidden" name="kode" value="<?php echo $kode?>">
    <?php $ruang=$data['ruang']; ?>
    <input type="hidden" name="ruang" value="<?php echo $ruang?>">
    <?php $kapasitas=$data['kapasitas']; ?>
    <input type="hidden" name="kapasitas" value="<?php echo $kapasitas?>">
    <input type="submit" name="submit" value="Submit">
</form>
<?php
    }
    else echo "Kode tidak ditemukan";
?>
