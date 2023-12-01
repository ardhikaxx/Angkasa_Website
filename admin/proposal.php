<?php
$koneksi = mysqli_connect("localhost", "tifbmyho_angkasa", "@JTIpolije2023", "tifbmyho_angkasa");
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../Login.php");
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
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/Logo Web.png">
    <title>Angkasa | Proposal Page</title>
</head>
<body>
    
</body>
</html>
