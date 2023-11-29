<?php

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pemesanan = $_POST['id_pemesanan'];
    $status = $_POST['status'];
    $update = mysqli_query($koneksi, "UPDATE pemesanan SET status = '$status' WHERE id_pemesanan = '$id_pemesanan'");
    if($update){
        $response = array(
            'code' => 200,
            'status' => 'Sukses'    
        );
        echo json_encode($response);
    }else{
        $response = array(
            'code' => 400,
            'status' => 'Gagal',
            
        );
        echo json_encode($response);
    }
}
    