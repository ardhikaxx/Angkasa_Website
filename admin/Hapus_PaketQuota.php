<?php
$koneksi = mysqli_connect("localhost", "tifbmyho_angkasa", "@JTIpolije2023", "tifbmyho_angkasa");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
$idquota=$_GET['id'];
mysqli_query($koneksi, "DELETE FROM quota WHERE id_quota='$idquota'") or die (mysql_error());
header("Location:Paket_layout.php?deleteMessage=Data+Quota+Berhasil+Dihapus!");
?>