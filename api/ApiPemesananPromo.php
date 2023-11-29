<?php

include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $data = mysqli_query($koneksi, "SELECT pemesanan.id_pemesanan, pemesanan.status, customer.nama_cust, customer.no_hp, pemesanan.alamat_acara, promo.bulan,promo.judul_promo, promo.nama_promo, promo.harga_promo 
    FROM pemesanan 
    LEFT JOIN promo ON pemesanan.id_promo = promo.id_promo
    LEFT JOIN customer ON pemesanan.id_customer = customer.id_customer 
    WHERE pemesanan.id_promo IS NOT NULL");
    $json_array = array();
    $response = "";

    while ($row = mysqli_fetch_assoc($data)){
        $json_array[] = $row;
    }

    $response = array(
        'code' => 200,
        'status' => 'Sukses',
        'data' => $json_array
    );

    echo json_encode($response);
}
?>
