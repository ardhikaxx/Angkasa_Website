<?php

include 'koneksi.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if 'id_pemesanan' key exists in the $_POST array
    if (isset($_POST['id_user'])) {
        $id_pemesanan = $_POST['id_user'];

        // Perform the deletion
        $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id_user'");

        // Check if the deletion was successful
        if ($delete) {
            $response = array(
                'code' => 200,
                'status' => 'Sukses',
                'message' => 'Pemesanan berhasil dihapus.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'code' => 400,
                'status' => 'Gagal',
                'message' => 'Gagal menghapus pemesanan.'
            );
            echo json_encode($response);
        }
    } else {
        // Handle the case where 'id_pemesanan' is not present in the $_POST array
        $response = array(
            'code' => 400,
            'status' => 'Gagal',
            'message' => 'id_pemesanan is missing.'
        );
        echo json_encode($response);
    }
} else {
    // Handle the case where the request method is not POST
    $response = array(
        'code' => 405,
        'status' => 'Method Not Allowed',
        'message' => 'Only POST method is allowed for this endpoint.'
    );
    echo json_encode($response);
}

?>
