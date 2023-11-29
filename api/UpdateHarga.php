<?php

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_promo = $_POST['id_promo'];
    $harga = $_POST['harga'];
    $update = mysqli_query($koneksi, "UPDATE promo SET harga_promo = '$harga' WHERE id_promo = '$id_promo'");
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
