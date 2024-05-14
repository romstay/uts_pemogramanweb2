<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
  $nim = $_POST['nim'];
  $jurusan = $_POST['jurusan'];
  $email = $_POST['email'];
  $nama = $_POST['nama'];
  $no_hp = $_POST['no_hp'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $alamat = $_POST['alamat'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $agama = $_POST['agama'];

  $file_gambar = $_FILES['foto'];
  $foto = null;
  if ($file_gambar['error'] == 0) {
    $filename = str_replace(' ', '_', $file_gambar['name']);
    $destination = dirname(__FILE__) . '/gambar/' . $filename;
    if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
      $foto = 'gambar/' . $filename;
    }
  }

  $sql = 'INSERT INTO adam_mahasiswa (nim, nama, email, no_hp, tempat_lahir, tgl_lahir, jenis_kelamin, jurusan, agama, alamat,foto)';
  $sql .= "VALUE ( '{$nim}','{$nama}', '{$email}', '{$no_hp}', '{$tempat_lahir}', '{$tgl_lahir}', '{$jenis_kelamin}', '{$jurusan}', '{$agama}', '{$alamat}', '{$foto}')";

  $result = mysqli_query($conn, $sql);
  header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <div class="container">
    <h1 class="mt-4">Tambah Data Mahasiswa</h1>
    <div class="form">
      <form action="tambah.php" method="post" enctype="multipart/form-data">
        <div class="form-group mt-2 col-md-6">
          <label for="nim">Nim :</label>
          <input type="text" name="nim" id="nim" class="form-control">
        </div>
        <div class="form-group mt-2 col-md-6">
          <label for="nama">Nama :</label>
          <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="form-group mt-2 col-md-6">
          <label for="email">Email :</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group mt-2 col-md-6">
          <label for="no_hp">No HP :</label>
          <input type="number" name="no_hp" id="no_hp" class="form-control">
        </div>
        <div class="form-group mt-2 col-md-6">
          <label for="tempat_lahir">Tempat Lahir :</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
        </div>
        <div class="form-group mt-2 col-md-6">
          <label for="tgl_lahir">Tanggal Lahir :</label>
          <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
        </div>
        <div class="form-group mt-2 mt-2 col-md-6">
          <label for="jenis_kelamin">Jenis Kelamin :</label>
          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control ">
            <option value="Laki-laki">Laki-laki </option>
            <option value="Perempuan">Perempuan </option>
          </select>
        </div>
        <div class="form-group mt-2 mt-2 col-md-6">
          <label for="jurusan">
            Jurusan :</label>
          <select name="jurusan" id="jurusan" class="form-control ">
            <option value="Teknik Informatika">Teknik Informatika </option>
            <option value="Teknik Industri">Teknik Industri </option>
            <option value="Teknik Nuklir">Teknik Nuklir </option>
            <option value="Teknik Lingkungan">Teknik Lingkungan </option>
            <option value="Hukum">Hukum </option>
            <option value="Manajemen">Manajemen </option>
            <option value="PGSD">PGSD </option>
            <option value="Sastra Inggris">Sastra Inggris </option>
            <option value="Sastra Jepang">Sastra Jepang </option>
            <option value="Sastra Korea">Sastra Korea </option>
          </select>
        </div>
        <div class="form-group mt-2 col-md-6">
          <label for="agama">Agama :</label>
          <select name="agama" id="agama" class="form-control ">
            <option value="Islam">Islam </option>
            <option value="Kristen">Kristen </option>
            <option value="Hindu">Hindu </option>
            <option value="Budha">Budha </option>
            <option value="Konghucu">Konghucu </option>
          </select>
        </div>
        <div class="form-group mt-2 col-md-6">
          <label for="alamat mt-2 ">Alamat :</label>
          <textarea name="alamat" id="alamat" class="form-control" rows="5"></textarea>
        </div>

        <div class="form-group mt-2 col-md-6">
          <label for="file_gambar">File Gambar :</label>
          <input type="file" name="foto" id="foto" class="form-control">
        </div>

        <div class="form-group mt-4 col-md-6" style="margin-bottom:50px">
          <input type="submit" name="submit" value="Simpan" id="" class="btn btn-primary w-100">
        </div>
      </form>
    </div>
  </div>
</body>

</html>