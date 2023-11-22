<?php
$koneksi = mysqli_connect("localhost", "root", "", "angkasa");
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /Angkasa_Website/login.php");
    exit;
}
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$id = isset($_GET['id_pemesanan']) ? $_GET['id_pemesanan'] : null;

$query_proposal = "SELECT pemesanan.id_pemesanan,customer.nama_cust,customer.no_hp,pemesanan.alamat_acara,pemesanan.tanggal_acara,pemesanan.proposal
from customer join pemesanan on customer.id_customer=pemesanan.id_customer WHERE pemesanan.proposal IS NOT NULL AND pemesanan.id_pemesanan = '$id'";
$result = mysqli_query($koneksi, $query_proposal);

while($row = mysqli_fetch_array($result)) {

    ?>
    <object data = "../proposal/<?php echo $row['proposal']?>"
    width   ="100%"
    height  ="1000px"
    style   ="box-shadow: 2px 2px 8px #000000;"></object>

    <?php
    
    print_r($row);
}

mysqli_close($koneksi);
?>
