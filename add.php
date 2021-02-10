<?php
include("./koneksi.php");

if (isset($_POST['submit'])) {
  $KodeJadwal = $_POST["KodeJadwal"];
  $NIP = $_POST["NIP"];
  $KodeKelas = $_POST["KodeKelas"];
  $Hari = $_POST["Hari"];
  $Jam = $_POST["Jam"];

  $query_jadwal = "INSERT INTO Jadwal VALUES ('$KodeJadwal', '$Hari', '$Jam', '$NIP', '$KodeKelas')";
  $execute_query_jadwal = mysqli_query($koneksi, $query_jadwal);

  if ($execute_query_jadwal) {
    echo "<script>alert('Data Jadwal Berhasil Disimpan!')</script>";
    echo "<script>window.location = 'index.php'</script>";
  } else {
    echo "<script>alert('Data Gagal Disimpan!')</script>";
    echo "<script>window.location = 'index.php'</script>";
  }
} else {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJI PROGRAM JADWAL - 10518122</title>
  </head>

  <style>
    body {
      max-width: 800px;
      margin: 24px auto;
      border: 1px solid #ccc;
      padding: 50px;
      border-radius: 5px;
      font-family: "Comic Sans MS", "Comic Sans", cursive;
    }

    table {
      width: 100%;
    }

    h1 {
      margin-top: 0;
    }

    input, select {
      padding: 6px 3px;
      width: 100%;
      box-sizing: border-box;
    }

    .simpan {
      display: inline-block;
      width: auto;
      padding: 6px 8px;
    }

  </style>

  <body>
    <h1>UJI PROGRAM</h1>
    <h1>TAMBAH DATA JADWAL</h1>
    <br>
    <br>
    <div>
      <form method="POST">
        <table cellpadding="5">
          <tbody>
            <tr>
              <td>Kode Jadwal</td>
              <td> <input type="text" name="KodeJadwal">
              </td>
            </tr>
            <tr>
              <td>NIP</td>
              <td>
                <select name="NIP">
                  <option value="">Pilih Guru</option>
                  <?php
                  $query_guru = "SELECT NIP, NamaGuru FROM Guru";
                  $get_data_guru = mysqli_query($koneksi, $query_guru);
                  while ($data_guru = mysqli_fetch_array($get_data_guru)) {
                    echo "<option value='$data_guru[0]'>$data_guru[0] - $data_guru[1]</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Kode Kelas</td>
              <td>
                <select name="KodeKelas">
                  <option value="">Pilih Kelas</option>
                  <?php
                  $query_kelas = "SELECT KodeKelas, NamaKelas FROM Kelas";
                  $get_data_kelas = mysqli_query($koneksi, $query_kelas);
                  while ($data_kelas = mysqli_fetch_array($get_data_kelas)) {
                    echo "<option value='$data_kelas[0]'>$data_kelas[0] - $data_kelas[1]</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Hari</td>
              <td>
                <select name="Hari">
                  <option value="">Pilih Hari</option>
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jumat">Jumat</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Jam</td>
              <td>
                <select name="Jam">
                  <option value="">Pilih Jam</option>
                  <option value="13:00:00">13:00:00</option>
                  <option value="14:00:00">14:00:00</option>
                  <option value="15:00:00">15:00:00</option>
                  <option value="16:00:00">16:00:00</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>
              </td>
              <td><input class="simpan" type="submit" name="submit" value="Simpan"></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </body>

  </html>
<?php }
