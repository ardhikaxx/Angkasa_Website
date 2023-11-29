<?php

include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $data = mysqli_query($koneksi, "SELECT pemesanan.id_pemesanan,customer.nama_cust,pemesanan.status,customer.no_hp,quota.harga_quota as asd,
    pemesanan.alamat_acara,pemesanan.tanggal_acara,pemesanan.nama_package,bukti_bayar,layout.nama_layout,
    COALESCE(quota.nama_quota, 'null') AS nama_quota,COALESCE(unlimited.harga_unlimited, 'kosong') AS harga_unlimited,COALESCE(unlimited.nama_unlimited, 'null') AS nama_unlimited 
    FROM pemesanan LEFT JOIN customer ON pemesanan.id_customer = customer.id_customer LEFT JOIN detail_pemesanan ON pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan 
    LEFT JOIN layout ON detail_pemesanan.id_layout = layout.id_layout 
    LEFT JOIN quota ON detail_pemesanan.id_quota = quota.id_quota 
    LEFT JOIN unlimited ON detail_pemesanan.id_unlimited = unlimited.id_unlimited  WHERE pemesanan.id_customer AND nama_package IS NOT NULL AND alamat_acara LIKE '%jember%'");
    $json_array = array();
    $response = "";

    while ($row = mysqli_fetch_assoc($data)){
        $json_array[] = $row;
    }
    $response = array(
        'code' => 200,
        'status' => 'Sukses',
        'data'=> $json_array
        
    );

    echo json_encode($response);
}