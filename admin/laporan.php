<?php
$koneksi = mysqli_connect("localhost", "root", "", "angkasa");
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /Angkasa_Website/login.php");
    exit;
}
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
function cari_nama($koneksi, $nama_cari, $start_from, $records_per_page)
{
    $query = "SELECT * FROM customer WHERE nama_cust LIKE '%$nama_cari%' LIMIT $start_from, $records_per_page";
    $result = mysqli_query($koneksi, $query);

    $no = $start_from + 1;

    while ($row = mysqli_fetch_array($result)) {
        $id = isset($row['id_pemesanan']) ? $row['id_pemesanan'] : '';
        $namalengkapcustomer = isset($row['nama_cust']) ? $row['nama_cust'] : '';
        $teleponcustomer = isset($row['no_hp']) ? $row['no_hp'] : '';
        $alamatacara = isset($row['alamat_acara']) ? $row['alamat_acara'] : '';
        $proposal = isset($row['proposal']) ? $row ['proposal']:'';
        ?>
        <tr>
            <td>
                <?php echo $no; ?>
            </td>
            <td>
                <?php echo $namalengkapcustomer; ?>
            </td>
            <td>
                <?php echo $teleponcustomer; ?>
            </td>
            <td>
                <?php echo $alamatacara; ?>
            </td>
            <td>
                <?php echo $proposal;?>
            </td>
            <td>
                <a href="#" class="btn-selesai" data-id="<?php echo $id; ?>"><i class="fa fa-check"></i></a>
                <a href="#" class="btn-belum" data-id="<?php echo $id; ?>"><i class="fa fa-times"></i></a>
            </td>
        </tr>
        <?php
        $no++;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Angkasa | Laporan Page</title>
    <title>Navbar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/png" href="/Angkasa_Website/assets/Logo Web.png">
    <style>
        body {
            background-color: #EBECF0;
        }

        html {
            scroll-behavior: smooth;
        }

        #circularcursor {
            background-color: #000;
            border: 1px solid black;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            position: absolute;
            z-index: 1;
            transition: left 0.1s, top 0.1s;
            transform: translate(-30%, -15%);
            pointer-events: none;
        }

        ::-webkit-scrollbar {
            width: 10px;
            border-radius: 50px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 30px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #bbb;
        }

        .navbar {
            position: fixed;
            top: 1rem;
            left: 1rem;
            background: #000000;
            border-radius: 10px;
            padding: 1rem 0;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.03);
            height: calc(100vh - 4rem);
            z-index: 1;
            font-family: "Poppins", sans-serif;
        }

        .navbar img {
            height: 4rem;
            width: 4.5rem;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 5px;
        }

        .navbar__link {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 3.5rem;
            width: 5.5rem;
            color: #ffffff;
            transition: 250ms ease all;
            text-decoration: none;
        }

        .navbar__link span {
            position: absolute;
            left: 100%;
            transform: translate(-3rem);
            margin-left: 1rem;
            opacity: 0;
            pointer-events: none;
            color: #ffffff;
            background: #000000;
            padding: 0.75rem;
            transition: 250ms ease all;
            border-radius: 17.5px;
        }

        .navbar__link:hover {
            color: #000000;
        }

        .navbar:not(:hover) .navbar__link:focus span,
        .navbar__link:hover span {
            opacity: 1;
            transform: translate(0);
        }

        .navbar__menu {
            position: relative;
            margin-top: 250px;
        }

        .navbar__item:last-child:before {
            content: "";
            position: absolute;
            opacity: 0;
            z-index: -1;
            top: 0;
            left: 1rem;
            width: 3.5rem;
            height: 3.5rem;
            background: #ffffff;
            border-radius: 17.5px;
            transition: 250ms cubic-bezier(1, 0.2, 0.1, 1.2) all;
        }

        .navbar__item:first-child:nth-last-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(1)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(1):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(1)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(1):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(1)~li:last-child:hover:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(2)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(2):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(2)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(2):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(2)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(2):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(2)~li:last-child:hover:before {
            top: 50%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(3)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(3):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(3)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(3):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(3)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(3):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(3)~li:nth-child(2):hover~li:last-child:before {
            top: 33.3333333333%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(3):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(3)~li:last-child:hover:before {
            top: 66.6666666667%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(4)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(4):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(4)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(4):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(4)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(4):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(4)~li:nth-child(2):hover~li:last-child:before {
            top: 25%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(4):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(4)~li:nth-child(3):hover~li:last-child:before {
            top: 50%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(4):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(4)~li:last-child:hover:before {
            top: 75%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(5)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(5):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(5)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(5):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(5)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(5):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(5)~li:nth-child(2):hover~li:last-child:before {
            top: 20%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(5):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(5)~li:nth-child(3):hover~li:last-child:before {
            top: 40%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(5):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(5)~li:nth-child(4):hover~li:last-child:before {
            top: 60%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(5):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(5)~li:last-child:hover:before {
            top: 80%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(6):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(6)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(6):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(6)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(6):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(6)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(6):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(6)~li:nth-child(2):hover~li:last-child:before {
            top: 16.6666666667%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(6):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(6)~li:nth-child(3):hover~li:last-child:before {
            top: 33.3333333333%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(6):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(6)~li:nth-child(4):hover~li:last-child:before {
            top: 50%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(6):nth-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(6)~li:nth-child(5):hover~li:last-child:before {
            top: 66.6666666667%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(6):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(6)~li:last-child:hover:before {
            top: 83.3333333333%;
            animation: gooeyEffect-6 250ms 1;
        }

        @keyframes gooeyEffect-6 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(7):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(7)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(7):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:nth-child(2):hover~li:last-child:before {
            top: 14.2857142857%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:nth-child(3):hover~li:last-child:before {
            top: 28.5714285714%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:nth-child(4):hover~li:last-child:before {
            top: 42.8571428571%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):nth-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:nth-child(5):hover~li:last-child:before {
            top: 57.1428571429%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):nth-child(6):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(7)~li:nth-child(6):hover~li:last-child:before {
            top: 71.4285714286%;
            animation: gooeyEffect-6 250ms 1;
        }

        @keyframes gooeyEffect-6 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(7):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(7)~li:last-child:hover:before {
            top: 85.7142857143%;
            animation: gooeyEffect-7 250ms 1;
        }

        @keyframes gooeyEffect-7 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(8):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(8)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(2):hover~li:last-child:before {
            top: 12.5%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(3):hover~li:last-child:before {
            top: 25%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(4):hover~li:last-child:before {
            top: 37.5%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(5):hover~li:last-child:before {
            top: 50%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(6):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(6):hover~li:last-child:before {
            top: 62.5%;
            animation: gooeyEffect-6 250ms 1;
        }

        @keyframes gooeyEffect-6 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):nth-child(7):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(8)~li:nth-child(7):hover~li:last-child:before {
            top: 75%;
            animation: gooeyEffect-7 250ms 1;
        }

        @keyframes gooeyEffect-7 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(8):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(8)~li:last-child:hover:before {
            top: 87.5%;
            animation: gooeyEffect-8 250ms 1;
        }

        @keyframes gooeyEffect-8 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(9):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(9)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(2):hover~li:last-child:before {
            top: 11.1111111111%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(3):hover~li:last-child:before {
            top: 22.2222222222%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(4):hover~li:last-child:before {
            top: 33.3333333333%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(5):hover~li:last-child:before {
            top: 44.4444444444%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(6):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(6):hover~li:last-child:before {
            top: 55.5555555556%;
            animation: gooeyEffect-6 250ms 1;
        }

        @keyframes gooeyEffect-6 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(7):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(7):hover~li:last-child:before {
            top: 66.6666666667%;
            animation: gooeyEffect-7 250ms 1;
        }

        @keyframes gooeyEffect-7 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):nth-child(8):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(9)~li:nth-child(8):hover~li:last-child:before {
            top: 77.7777777778%;
            animation: gooeyEffect-8 250ms 1;
        }

        @keyframes gooeyEffect-8 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(9):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(9)~li:last-child:hover:before {
            top: 88.8888888889%;
            animation: gooeyEffect-9 250ms 1;
        }

        @keyframes gooeyEffect-9 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(10):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(10)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(2):hover~li:last-child:before {
            top: 10%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(3):hover~li:last-child:before {
            top: 20%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(4):hover~li:last-child:before {
            top: 30%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(5):hover~li:last-child:before {
            top: 40%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(6):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(6):hover~li:last-child:before {
            top: 50%;
            animation: gooeyEffect-6 250ms 1;
        }

        @keyframes gooeyEffect-6 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(7):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(7):hover~li:last-child:before {
            top: 60%;
            animation: gooeyEffect-7 250ms 1;
        }

        @keyframes gooeyEffect-7 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(8):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(8):hover~li:last-child:before {
            top: 70%;
            animation: gooeyEffect-8 250ms 1;
        }

        @keyframes gooeyEffect-8 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):nth-child(9):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(10)~li:nth-child(9):hover~li:last-child:before {
            top: 80%;
            animation: gooeyEffect-9 250ms 1;
        }

        @keyframes gooeyEffect-9 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(10):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(10)~li:last-child:hover:before {
            top: 90%;
            animation: gooeyEffect-10 250ms 1;
        }

        @keyframes gooeyEffect-10 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:hover~li:last-child:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(11):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(11)~li:last-child:hover:before {
            opacity: 1;
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(1):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(1):hover~li:last-child:before {
            top: 0%;
            animation: gooeyEffect-1 250ms 1;
        }

        @keyframes gooeyEffect-1 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(2):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(2):hover~li:last-child:before {
            top: 9.0909090909%;
            animation: gooeyEffect-2 250ms 1;
        }

        @keyframes gooeyEffect-2 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(3):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(3):hover~li:last-child:before {
            top: 18.1818181818%;
            animation: gooeyEffect-3 250ms 1;
        }

        @keyframes gooeyEffect-3 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }
        .navbar__item:first-child:nth-last-child(11):nth-child(4):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(4):hover~li:last-child:before {
            top: 27.2727272727%;
            animation: gooeyEffect-4 250ms 1;
        }

        @keyframes gooeyEffect-4 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(5):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(5):hover~li:last-child:before {
            top: 36.3636363636%;
            animation: gooeyEffect-5 250ms 1;
        }

        @keyframes gooeyEffect-5 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(6):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(6):hover~li:last-child:before {
            top: 45.4545454545%;
            animation: gooeyEffect-6 250ms 1;
        }

        @keyframes gooeyEffect-6 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(7):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(7):hover~li:last-child:before {
            top: 54.5454545455%;
            animation: gooeyEffect-7 250ms 1;
        }

        @keyframes gooeyEffect-7 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(8):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(8):hover~li:last-child:before {
            top: 63.6363636364%;
            animation: gooeyEffect-8 250ms 1;
        }

        @keyframes gooeyEffect-8 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(9):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(9):hover~li:last-child:before {
            top: 72.7272727273%;
            animation: gooeyEffect-9 250ms 1;
        }

        @keyframes gooeyEffect-9 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):nth-child(10):hover~li:last-child:before,
        .navbar__item:first-child:nth-last-child(11)~li:nth-child(10):hover~li:last-child:before {
            top: 81.8181818182%;
            animation: gooeyEffect-10 250ms 1;
        }

        @keyframes gooeyEffect-10 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .navbar__item:first-child:nth-last-child(11):last-child:hover:before,
        .navbar__item:first-child:nth-last-child(11)~li:last-child:hover:before {
            top: 90.9090909091%;
            animation: gooeyEffect-11 250ms 1;
        }

        @keyframes gooeyEffect-11 {
            0% {
                transform: scale(1, 1);
            }

            50% {
                transform: scale(0.5, 1.5);
            }

            100% {
                transform: scale(1, 1);
            }
        }

        .content {
            width: 950px;
            margin: 0 auto;
            background-color: #EBECF0 0.5;
            backdrop-filter: blur(5px);
            font-family: "Poppins", sans-serif;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            margin-top: 50px;
            margin-left: 200px;
        }

        .modal {
            background-color: #EBECF0;
            font-family: "Poppins", sans-serif;
            color: #000;
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            z-index: 1000;
            text-align: center;
            padding: 20px;
            width: 400px;
        }

        .btn-confirm,
        .btn-cancel {
            padding: 10px 20px;
            cursor: pointer;
            border: none;
            border-radius: 50px;
            margin-top: 20px;
            margin-left: 10px;
            color: white;
            transition: all 0.4s ease;
            text-rendering: optimizeLegibility;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
        }

        .btn-confirm {
            background: #00C82E;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            opacity: 1;
        }

        .btn-cancel {
            background: #E4071C;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            opacity: 1;
        }

        .btn-confirm:hover {
            transform: scale(1.1);
        }

        .btn-cancel:hover {
            transform: scale(1.1);
        }

        .modal-overlay {
            backdrop-filter: blur(5px);
            background-color: rgba(0, 0, 0, 0.7);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 999;
            display: none;
        }

        .tabel-laporan {
            width: 900px;
            margin: 0 auto;
            background-color: #EBECF0 0.5;
            backdrop-filter: blur(5px);
            font-family: "Poppins", sans-serif;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            margin-top: 50px;
            margin-left: 200px;
        }

        .tabel-laporan h1 {
            margin-bottom: 20px;
            font-size: 25px;
            color: #000;
            font-weight: 800;
        }

        .tabel-laporan table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .tabel-laporan th,
        .tabel-laporan td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }

        .tabel-akun tr {
            margin-top: 20px;
        }

        .tabel-laporan th {
            background-color: #000;
            color: #fff;
        }

        .btn-selesai {
            background-color: #00C82E;
            color: #fff;
            border-radius: 10px;
            padding: 10px 15px;
            margin-right: 10px;
            text-decoration: none;
        }

        .btn-belum {
            background-color: #E4071C;
            color: #fff;
            border-radius: 10px;
            padding: 10px 15px;
            margin-right: 10px;
            text-decoration: none;
        }

        .btn-selesai,
        .btn-belum:hover {
            opacity: 0.9;
        }

        input[type="text"] {
            width: 250px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: rgba(0, 0, 0, 0.15);
            background-color: #EBECF0;
            text-shadow: 1px 1px 0 #FFF;
            box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
            border-radius: 15px;
            border: none;
            outline: none;
            margin: 10px;
        }

        button {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 15px;
            cursor: pointer;
            margin: 10px;
        }

        .search button:hover {
            background-color: #333;
        }

        .search-icon {
            margin-right: 5px;
        }

        #page-links {
            text-align: center;
            margin-top: 20px;
        }

        #page-links a {
            text-decoration: none;
            color: #000;
            padding: 5px 10px;
            border: 2px solid #000;
            border-radius: 5px;
            margin: 0 5px;
        }

        #page-links a:hover {
            background-color: #000;
            color: #fff;
        }

        #page-links a.active {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <img src="assets/Logo Angkasa Photobooth.png" alt="Logo">
        <ul class="navbar__menu">
            <li class="navbar__item">
                <a href="dashboard-admin.php" class="navbar__link"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li class="navbar__item">
                <a href="register.php" class="navbar__link"><i data-feather="users"></i><span>Register</span></a>
            </li>
            <li class="navbar__item">
                <a href="laporan.php" class="navbar__link"><i data-feather="folder"></i><span>Laporan</span></a>
            </li>
            <li class="navbar__item">
                <a href="settings.php" class="navbar__link" id="settings"><i
                        data-feather="settings"></i><span>Pengaturan</span></a>
            </li>
            <li class="navbar__item">
                <a href="#" class="navbar__link" id="logout"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </li>
        </ul>
    </nav>

    <div id="circularcursor"></div>

    <div id="overlay" class="modal-overlay"></div>

    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <p>Anda akan logout. Apakah Anda yakin?</p>
            <button id="confirmLogout" class="btn-confirm">Iya</button>
            <button id="cancelLogout" class="btn-cancel">Tidak</button>
        </div>
    </div>

    <div class="tabel-laporan">
        <h1>Laporan Pemesanan</h1>
        <form method="GET">
            <input type="text" name="search" id="search" placeholder="Cari Nama Customer" autocomplete="off">
            <button class="search" type="submit">
                <i class="fas fa-search search-icon"></i> Cari
            </button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>No Hp</th>
                    <th>Alamat Acara</th>
                    <th>Proposal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="tabel-akun">
                <?php
                $records_per_page = 5;
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start_from = ($current_page - 1) * $records_per_page;
                if (isset($_GET['search'])) {
                    $searchquery = $_GET['search'];
                    cari_nama($koneksi, $searchquery, $start_from, $records_per_page);
                } else {
                    $query="SELECT pemesanan.id_pemesanan,customer.nama_cust,customer.no_hp,pemesanan.alamat_acara,pemesanan.proposal FROM pemesanan JOIN customer ON pemesanan.id_customer=customer.id_customer LIMIT $start_from, $records_per_page";
                    $result = mysqli_query($koneksi, $query);
                    $no = $start_from + 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $id = isset($row['id_pemesanan']) ? $row['id_pemesanan'] : '';
                        $namalengkapcustomer = isset($row['nama_cust']) ? $row['nama_cust'] : '';
                        $teleponcustomer = isset($row['no_hp']) ? $row['no_hp'] : '';
                        $alamatacara = isset($row['alamat_acara']) ? $row['alamat_acara'] : '';
                        $proposal=isset($row['proposal']) ? $row ['proposal']:'';
                        ?>
                        <tr>
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $namalengkapcustomer; ?>
                            </td>
                            <td>
                                <?php echo $teleponcustomer; ?>
                            </td>
                            <td>
                                <?php echo $alamatacara; ?>
                            </td>
                            <td>
                                <?php echo $proposal;?>
                            </td>
                            <td>
                                <a href="#" class="btn-selesai" data-id="<?php echo $id; ?>"><i class="fa fa-check"></i></a>
                                <a href="#" class="btn-belum" data-id="<?php echo $id; ?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>
        <div id="page-links">
            <?php
            $total_records = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_pemesanan FROM pemesanan"));
            $total_pages = ceil($total_records / $records_per_page);
            for ($i = 1; $i <= $total_pages; $i++) {
                echo '<a href="?page=' . $i . '">' . $i . '</a> ';
            }
            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $(document).on('mousemove', function (e) {
                $('#circularcursor').css({
                    left: e.pageX,
                    top: e.pageY
                });
            })
        });
    </script>

    <script src='https://unpkg.com/feather-icons'></script>
    <script>feather.replace()</script>

    <script>
        const logoutLink = document.getElementById('logout');
        const logoutModal = document.getElementById('logoutModal');
        const confirmLogoutBtn = document.getElementById('confirmLogout');
        const cancelLogoutBtn = document.getElementById('cancelLogout');
        const overlay = document.getElementById('overlay');

        logoutLink.addEventListener('click', function (e) {
            e.preventDefault();
            logoutModal.style.display = 'block';
            overlay.style.display = 'block';
        });

        cancelLogoutBtn.addEventListener('click', function () {
            logoutModal.style.display = 'none';
            overlay.style.display = 'none';
        });

        confirmLogoutBtn.addEventListener('click', function () {
            window.location.href = '/Angkasa_Website/logout.php';
        });
    </script>
</body>

</html>