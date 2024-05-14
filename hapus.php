<?php
include_once 'koneksi.php';
$id = $_GET['id'];

$sql = "DELETE FROM adam_mahasiswa WHERE id = '{$id}'";
$result = mysqli_query($conn, $sql);
header('location: index.php');