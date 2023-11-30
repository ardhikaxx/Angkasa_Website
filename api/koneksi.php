<?php
$server     = "localhost";
$username   = "tifbmyho_angkasa";
$password   = "@JTIpolije2023";
$db         ="tifbmyho_angkasa";
$koneksi    = mysqli_connect($server, $username, $password, $db);

if(mysqli_connect_errno()) {
    echo "Koneksi gagal : ".mysqli_connect_error();
}
?>