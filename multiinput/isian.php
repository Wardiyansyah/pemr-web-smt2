<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Mahasiswa</title>
  </head>
  <body>
    <form action="insert.php" method="post">
      <table border='2'>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Jurusan</th>
          <th>Kelas</th>
        </tr>
        <?php
        $n = $_POST['jumlah'];
        for ($i = 1; $i <= $n; $i++):
            ?>
          <tr>
            <td>
              <?= $i ?>
            </td>
            <td>
              <input type="text" name="<?= "nim".$i ?>"
            </td>
            <td>
              <input type="text" name="<?= "nama".$i ?>"
            </td>
            <td>
              <select name="<?= "jurusan".$i ?>">
                <option value="SE">SE</option>  
                <option value="SI">SI</option>
                <option value="TI">TI</option>
              </select>
            </td>
            <td>
              <select name="<?= "kelas".$i ?>">
                <option value="Pagi">Pagi</option>
                <option value="Malam">Malam</option>
                <option value="Shift">Shift</option>
              </select>
            </td>
          </tr>
        <?php endfor ?>
      </table><br>
      <input type="hidden" name="jum2" value="<?= $n ?>">
      <button type="submit">Submit</button>
    </form>
  </body>
</html>
