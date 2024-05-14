<?php
// error_reporting(E_ALL);
include_once 'koneksi.php';
$id = $_GET['id'];

if (isset($_POST['submit'])) {
  $id_mhs = $_POST['id'];
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

  $file_gambar = $_FILES['file_gambar'];
  $gambar = null;
  if ($file_gambar['error'] == 0) {
    $filename = str_replace(' ', '_', $file_gambar['name']);
    $destination = dirname(__FILE__) . '/gambar/' . $filename;
    if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
      $gambar = 'gambar/' . $filename;
    }
  }

  $sql = 'UPDATE adam_mahasiswa SET ';
  $sql .= "nama = '{$nama}', nim = '{$nim}', ";
  $sql .= "no_hp = '{$no_hp}', jurusan = '{$jurusan}', agama = '{$agama}',";
  $sql .= "tgl_lahir = '{$tgl_lahir}', tempat_lahir = '{$tempat_lahir}', jenis_kelamin = '{$jenis_kelamin}', ";
  $sql .= "alamat = '{$alamat}', email = '{$email}' ";
  if (!empty($gambar))
    $sql .= ", foto = '{$gambar}' ";
  $sql .= "WHERE id='{$id_mhs}' ";
  $result = mysqli_query($conn, $sql);
  header('location: index.php');


  // $result = mysqli_query($conn, $sql);
  // header('location: index.php');
}

$sql = "SELECT * FROM adam_mahasiswa WHERE id='{$id}' ";
$result = mysqli_query($conn, $sql);
if (!$result) die("Error : Data tidak tersedia");
$data = mysqli_fetch_array($result);

function is_select($var, $val)
{
  if ($var == $val) return 'selected="selected"';
  return false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <div class="container">
    <h1>Ubah Data <?= $_GET['id'] ?></h1>
    <div class="form">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-6">
          <label for="nim">Nim :</label>
          <input type="text" name="nim" id="nim" value="<?= $data['nim'] ?>" class="form-control" readonly>
        </div>
        <div class="form-group col-md-6">
          <label for="nama">Nama :</label>
          <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>" class="form-control">
        </div>
    </div>
    <div class="form-group mt-2 col-md-6">
      <label for="email mt-2 ">Email:</label>
      <input type="email" name="email" value="<?= $data['email'] ?>" id="email" class="form-control">
    </div>
    <div class="form-group mt-2 col-md-6">
      <label for="no_hp mt-2 ">No Hp:</label>
      <input type="number" name="no_hp" value="<?= $data['no_hp'] ?>" id="no_hp" class="form-control">
    </div>
    <div class="form-group mt-2 col-md-6">
      <label for="tempat_lahir">Tempat Lahir:</label>
      <input type="text" value="<?= $data['tempat_lahir'] ?>" name="tempat_lahir" id="tempat_lahir"
        class="form-control">
    </div>
    <div class="form-group mt-2 col-md-6">
      <label for="tgl_lahir">Tanggal Lahir:</label>
      <input type="text" value="<?= $data['tgl_lahir'] ?>" name="tgl_lahir" id="tgl_lahir" class="form-control">
    </div>

    <div class="form-group mt-2 col-md-6">
      <label for="jk">Jenis Kelamin :</label>
      <select name="jenis_kelamin" id="jk" class="form-control ">
        <option value="Laki-laki" <?php echo is_select("Laki-laki", $data["jenis_kelamin"]); ?>>Laki-laki </option>
        <option value="Perempuan" <?php echo is_select("Perempuan", $data["jenis_kelamin"]); ?>>
          Perempuan </option>
      </select>
    </div>

    <div class="form-group mt-2 col-md-6">
      <label for="jurusan">Jurusan :</label>
      <select name="jurusan" id="jurusan" class="form-control ">
        <option value="Teknik Informatika" <?php echo is_select("Teknik Informatika", $data["jurusan"]); ?>>Teknik
          Informatika </option>
        <option value="Teknik Industri" <?php echo is_select("Teknik Industri", $data["jurusan"]); ?>>Teknik
          Industri </option>
        <option value="Teknik Nuklir" <?php echo is_select("Teknik Nuklir", $data["jurusan"]); ?>>Teknik Nuklir
        </option>
        <option value="Teknik Lingkungan" <?php echo is_select("Teknik Lingkungan", $data["jurusan"]); ?>>Teknik
          Lingkungan </option>
        <option value="Hukum" <?php echo is_select("Hukum", $data["jurusan"]); ?>>Hukum </option>
        <option value="Manajemen" <?php echo is_select("Manajemen", $data["jurusan"]); ?>>Manajemen </option>
        <option value="PGSD" <?php echo is_select("PGSD", $data["jurusan"]); ?>>PGSD </option>
        <option value="Sastra Inggris" <?php echo is_select("Sastra Inggris", $data["jurusan"]); ?>>Sastra Inggris
        </option>
        <option value="Sastra Korea" <?php echo is_select("Sastra Korea", $data["jurusan"]); ?>>Sastra Korea
        </option>
        <option value="Sastra Jepang" <?php echo is_select("Sastra Jepang", $data["jurusan"]); ?>>Sastra Jepang
        </option>

      </select>
    </div>


    <div class="form-group mt-2 col-md-6">
      <label for="agama">Agama :</label>
      <select name="agama" id="agama" class="form-control ">
        <option value="Islam" <?php echo is_select("Islam", $data["agama"]); ?>>Islam </option>
        <option value="Kristen" <?php echo is_select("Kristen", $data["agama"]); ?>>Kristen </option>
        <option value="Hindu" <?php echo is_select("Hindu", $data["agama"]); ?>>Hindu </option>
        <option value="Buddha" <?php echo is_select("Buddha", $data["agama"]); ?>>Budha </option>
        <option value="Konghucu" <?php echo is_select("Konghucu", $data["agama"]); ?>>Konghucu </option>
      </select>
    </div>

    <div class="form-group mt-2 col-md-6">
      <label for="alamat">Alamat :</label>
      <textarea rows="5" name="alamat" id="alamat" class="form-control"><?= $data['alamat'] ?></textarea>
    </div>
    <div class="form-group mt-2 col-md-6">
      <label for="file_gambar">File Gambar :</label>
      <input type="file" name="file_gambar" id="file_gambar" class="form-control">
    </div>
    <input type="hidden" value="<?= $data['id'] ?>" name="id">
    <div class="form-group mt-4 col-md-6">
      <input type="submit" name="submit" value="Simpan" id="" class="btn btn-primary w-100">
    </div>
    </form>
  </div>
  </div>
</body>

</html>