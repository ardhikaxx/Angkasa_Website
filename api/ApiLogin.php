<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'koneksi.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query_check = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $check = mysqli_fetch_array(mysqli_query($koneksi, $query_check));
    $json_array = array();
    $response = "";

    if (isset($check)) {
        $query_check_pass = "Select * from user where email = '$email' and password = '$password' and jabatan = 'Karyawan'";
        $query_pass_result = mysqli_query($koneksi, $query_check_pass);
        $check_password = mysqli_fetch_array($query_pass_result);
        if (isset($check_password)){
            $query_pass_result = mysqli_query($koneksi, $query_check_pass);
            while ($row = mysqli_fetch_assoc($query_pass_result)){
                $json_array[] = $row;
            }
            $response = array(
                'code' => 200,
                'status' => 'Sukses',
                'data'=> $json_array
                
            );
        }else {
            $response = array(
                'code' => 401,
                'status' => 'Password salah , periksa kembali!',
                'data' => $json_array
            );
        }
        }else {
            $response = array(
                'code' => 404,
                'status' => 'Password atau Email Salah, silahkan ketik dengan benar',
                'data' => $json_array
            );
        }
        echo json_encode($response);
        mysqli_close($koneksi);
    }
    ?>
