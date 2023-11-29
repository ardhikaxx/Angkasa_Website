<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include 'koneksi.php';
    $conn = mysqli_connect($host,$user,$pass,$nama_lengkap);

    $email = $_GET['email'];
    $password = $_GET['password'];

    $query= "SELECT * FROM user WHERE email = '$email'";
    $check = mysqli_fetch_array(mysqli_query($koneksi, $query));
    $json_array = array();
    $cresponse = "";
    if (isset($check)) {
        $query_check= "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $query_pass_result = mysqli_query($koneksi, $query_check);
        $check_pass = mysqli_fetch_array($query_pass_result);

        if(isset($check_pass)){
            $query_pass_result = mysqli_query($koneksi, $query_check);
            while($row = mysqli_fetch_assoc($query_pass_result)) {
                $json_array[] = $row;
                $data = mysqli_fetch_object($check);
            }
            $response = array(
            "status"=> 201,
            "message"=> 'success',
            "nama_lengkap"=> $data->nama_lengkap
        );
    } else {
        $response = array(
            "status"=> 202,
            "message"=> 'Password Salah, Periksa Kembali!',
        );
    }
    }else{
        $response = array(
        "status"=> 203,
        "message"=> 'data tidak ditemukan'
    );
}
}
?>

