<?php
include 'koneksi.php';

    $email = $_GET['email'];
    $password = $_GET['password'];

    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $cek = mysqli_query($koneksi, $query);
    $count = mysqli_num_rows($cek);
    if ($count > 0) {
        $data = mysqli_fetch_object($cek);
        $result = [
            "status"=> 201,
            "message"=> "success",
            "nama_lengkap"=> $data->nama_lengkap
        ];

        echo json_encode($result);
    }else{
        $result = [
            "status"=> 201,
            "message"=> "failed"
        ];

        echo json_encode($result);
    }
