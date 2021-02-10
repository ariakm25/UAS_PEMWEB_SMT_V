<?php
include("./koneksi.php");

$query = "SELECT Jadwal.KodeJadwal, Guru.NamaGuru, Kelas.NamaKelas, Jadwal.Hari, Jadwal.Jam 
          FROM Jadwal 
            INNER JOIN Guru ON Guru.NIP = Jadwal.NIP 
            INNER JOIN Kelas ON Kelas.KodeKelas = Jadwal.KodeKelas";
$get_data_jadwal = mysqli_query($koneksi, $query);
$count = mysqli_num_rows($get_data_jadwal);

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
    margin: 16px 0;
  }

  table thead {
    background: #ddd;
  }

  table tr:not(:nth-child(odd)) {
    background: #eee;
  }


  h1 {
    margin-top: 0;
  }

  .tambah {
    text-align: left;
    display: block;
    padding: 4px 0;
  }
</style>

<body>
  <center>
    <h1>UJI PROGRAM</h1>
    <h1>JADWAL LES KELAS</h1>
    <br>
    <br>
    <a class="tambah" href="add.php">
      Tambah Jadwal
    </a>
    <table border="1" cellpadding="10" cellspacing="0">
      <thead>
        <th>Kode Jadwal</th>
        <th>Nama Guru</th>
        <th>Nama Kelas</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>Aksi</th>
      </thead>
      <tbody>
        <?php
        if ($count > 0) {
          while ($jadwal = mysqli_fetch_array($get_data_jadwal)) { ?>
            <tr>
              <td><?php echo $jadwal['KodeJadwal'] ?></td>
              <td><?php echo $jadwal['NamaGuru'] ?></td>
              <td><?php echo $jadwal['NamaKelas'] ?></td>
              <td><?php echo $jadwal['Hari'] ?></td>
              <td><?php echo $jadwal['Jam'] ?></td>
              <td>
                <a onClick="return konfirmasi()" href="delete.php?kode_jadwal=<?php echo $jadwal['KodeJadwal']; ?>">Delete</a>
              </td>
            </tr>
          <?php
          }
        } else { ?>
          <tr>
            <td colspan="9" align="center" height="20">
              <div>Belum Ada Data Jadwal</div>
            </td>
          </tr>
        <?php }
        ?>
      </tbody>
    </table>
  </center>

  <script>
    function konfirmasi() {
      var tanya = confirm("Hapus data ini?")
      if (tanya === true) {
        return true;
      } else {
        return false;
      }
    }
  </script>
</body>

</html>