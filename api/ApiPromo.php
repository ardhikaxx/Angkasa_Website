<?php
include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $data = mysqli_query($koneksi, "SELECT * FROM promo");

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