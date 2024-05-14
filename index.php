<?php
include("koneksi.php");

$sql = 'SELECT * FROM adam_mahasiswa';
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Data Barang</title>
</head>

<body>
  <div class="container mt-4">
    <div class="d-flex justify-content-between">

      <h1>Data Mahasiswa Universitas Harvard Cabang Tambun</h1>
      <a href="tambah.php" class="btn btn-primary mb-4">+ Tambah Mahasiswa</a>
    </div>
    <div class="main">
      <table class="table table-bordered table-striped">
        <tr>
          <th>No</th>
          <th>Foto</th>
          <th>Nim</th>
          <th>Nama </th>
          <th>Email</th>
          <th>Jurusan</th>
          <th>Tempat Lahir</th>
          <th>No HP</th>
          <th>Agama</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
        <?php if ($result) : ?>
        <?php $no = 1; ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><img width="100px" src="<?= $row['foto']; ?>" alt="<?= $row['nama']; ?>"></td>
          <td><?= $row['nim']; ?></td>
          <td><?= $row['nama']; ?></td>
          <td><?= $row['email']; ?></td>
          <td><?= $row['jurusan']; ?></td>
          <td><?= $row['tempat_lahir']; ?>, <?= $row['tgl_lahir']; ?></td>
          <td><?= $row['no_hp']; ?></td>
          <td><?= $row['agama']; ?></td>
          <td><?= $row['jenis_kelamin']; ?></td>
          <td><?= $row['alamat']; ?></td>
          <td><a type="button" class="btn btn-sm btn-secondary mt-2 mr-2" href="ubah.php?id=<?= $row['id']; ?>">Edit</a>
            <a type="button" onclick="return confirm('yakin ingin menghapus data ini? ')"
              class="btn btn-sm btn-danger mt-2" href="hapus.php?id=<?= $row['id']; ?>">Hapus</a>
          </td>
        </tr>
        <?php endwhile;
        else : ?>
        <tr>
          <td colspan="7"> Belum ada data</td>
        </tr>
        <?php endif; ?>
      </table>
    </div>
  </div>
  <script>
  function hapus() {
    alert("Anda bukan admin!")
  }

  function edit() {
    alert("Anda bukan admin!")
  }
  </script>
</body>

</html>