<?php

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_POST['id_user'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $update = mysqli_query($koneksi, "UPDATE user SET nama_lengkap = '$nama_lengkap', email = '$email', no_hp = '$no_hp', jenis_kelamin = '$jenis_kelamin' WHERE id_user = '$id_user'");
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
