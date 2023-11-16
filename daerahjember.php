<?php
$koneksi = mysqli_connect("localhost", "root", "", "angkasa");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if (isset($_POST['submit'])) {
    $namacustomer = isset($_POST['txt_nama']) ? $_POST['txt_nama'] : '';
    $nohp = isset($_POST['txt_phone']) ? $_POST['txt_phone'] : '';
    $alamatacara = isset($_POST['txt_address']) ? $_POST['txt_address'] : '';
    $tanggalacara = isset($_POST['txt_date']) ? $_POST['txt_date'] : '';
    $pilihanpackage = isset($_POST['txt_package']) ? $_POST['txt_package'] : '';
    $pilihpaketlayout = isset($_POST['paket-layout']) ? $_POST['paket-layout'] : '';
    $quota = isset($_POST['quota']) ? $_POST['quota'] : '';
    $unlimited = isset($_POST['unlimited']) ? $_POST['unlimited'] : '';
    $pilihanpembayaran = isset($_POST['txt_payment']) ? $_POST['txt_payment'] : '';
    // Pengecekan apakah tanggal yang dipilih lebih kecil dari tanggal hari ini
    $today = date("Y-m-d");
    if ($tanggalacara < $today) {
        $error = "Anda tidak dapat memilih tanggal yang sudah dilalui.";
        echo $error;
    } else {
        $check_date_query = "SELECT id_pemesanan FROM pemesanan WHERE tanggal_acara = '$tanggalacara'";
        $check_date_result = mysqli_query($koneksi, $check_date_query);



            if (mysqli_num_rows($check_date_result) > 0) {

                $error = "Tanggal tersebut telah dipesan. Silakan pilih tanggal lain.";
                echo $error;
            } else {
                $gambar = upload();
                if (!$gambar) {
                    return false;
                }
                

                $query_customer = "INSERT INTO customer (id_customer, nama_cust, no_hp) VALUES ('', '$namacustomer', '$nohp')";
                $result_customer = mysqli_query($koneksi, $query_customer);
                if ($result_customer) {
                    $last_inserted_customer_id = mysqli_insert_id($koneksi);
                    $query_pemesanan = "INSERT INTO pemesanan (id_pemesanan,id_customer,alamat_acara, tanggal_acara, nama_package,metode_bayar, bukti_bayar) VALUES ('','$last_inserted_customer_id','$alamatacara', '$tanggalacara', '$pilihanpackage',  '$pilihanpembayaran', '$gambar')";
                    $result_pemesanan = mysqli_query($koneksi, $query_pemesanan);
                    if ($result_pemesanan) {
                        $last_inserted_pemesanan_id = mysqli_insert_id($koneksi);
                        foreach ($pilihpaketlayout as $key => $value) {
                            if($_POST['paket'] == "quota"){
                                $query_detail_pemesanan = "INSERT INTO detail_pemesanan (id_pemesanan, id_layout, id_quota, id_unlimited) VALUES ('$last_inserted_pemesanan_id','$value', '$quota[$value]', null)";
                                $result_detail_pemesanan = mysqli_query($koneksi, $query_detail_pemesanan);
                            }else if(($_POST["paket"] == "unlimited")){
                                $query_detail_pemesanan = "INSERT INTO detail_pemesanan (id_pemesanan, id_layout, id_quota, id_unlimited) VALUES ('$last_inserted_pemesanan_id','$value', null, '$unlimited[$value]')";
                                $result_detail_pemesanan = mysqli_query($koneksi, $query_detail_pemesanan);
                            }
                        }

                        if ($result_detail_pemesanan) {
                            $koneksi->commit();
                            header("Location: Dashboard.php?successMessage=Pemesanan telah berhasil.");
                            exit();
                        } else {
                            $conn->rollback();
                            $error = "Pemesanan gagal. Silahkan coba lagi nanti.";
                        }
                    
                }
            }
        }
    }
} else {
    $error = "Gagal menyisipkan data ke tabel layout.";
}
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        header("Location: daerahjember.php?WarningMessage=pilih gambar terlebih dahulu!");
        exit();
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        header("Location: daerahjember.php?WarningMessage=Yang anda upload bukan gambar!");
        exit();
    }

    if ($ukuranFile > 1000000) {
        header("Location: daerahjember.php?WarningMessage=ukuran gambar terlalu besar!");
        exit();
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/Logo Web.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Angkasa | Pemesanan Page</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
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
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 5px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(5px);
        }

        .navbar-logo img {
            max-height: 65px;
        }

        .navbar-menu {
            list-style: none;
            font-family: "Poppins", sans-serif;
            display: flex;
            gap: 20px;
            margin: 0;
            font-weight: bold;
        }

        .navbar-menu li {
            margin: 0;
        }

        .navbar-menu li a {
            color: #000;
            text-decoration: none;
            padding: 8px 16px;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
            border-radius: 10px;
        }

        .navbar-menu #Pemesanan {
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
            border-radius: 10px;
        }

        .navbar-menu li a:hover {
            color: #fff;
            background-color: #000;
            transform: scale(1.1);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .active-link {
            color: #fff;
            background-color: #000;
            transform: scale(1.1);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: 0.3;
        }

        .admin-link {
            color: #000;
            font-family: "Poppins", sans-serif;
            text-decoration: none;
            padding: 8px 16px;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
            border-radius: 10px;
            font-weight: 700;
        }

        .admin-link:hover {
            color: #fff;
            background-color: #000;
            transform: scale(1);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .dropbtn {
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 10px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .header {
            margin-top: 100px;
            justify-content: center;
            align-items: center;
        }

        .container-pemesanan {
            width: 450px;
            padding: 10px;
            margin-top: 100px;
            margin-bottom: 25px;
            font-family: "Poppins", sans-serif;
        }

        .container-pemesanan h1 {
            font-size: 28px;
            text-align: center;
            color: #000;
            font-weight: 800;
            margin-bottom: 40px;
        }

        .container-pemesanan #step-2::after {
            margin-top: 100px;
        }

        .input-container {
            display: flex;
            align-items: center;
            margin-bottom: 11px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: transparent;
        }

        label {
            flex-basis: 30%;
            font-weight: bold;
        }

        input,
        select {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            border: none;
            outline: none;
            background-color: #EBECF0;
            box-shadow: inset 2px 2px 10px #BABECC, inset -5px -5px 10px #FFF;
            box-sizing: border-box;
        }

        button {
            background-color: #131313;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:disabled {
            background-color: #ccc;
            color: #888;
            cursor: not-allowed;
        }

        .next-button {
            margin-top: 20px;
        }

        .prev-button {
            background-color: #6c6c6c;
        }

        .submit-button {
            background-color: #4CAF50;
            margin-top: 10px;
        }

        .checkbox-group {
            height: 100px;
            margin-top: -10px;
        }

        .checkbox-group h3 {
            font-size: 16px;
            padding-right: 20px;
            align-items: start;
        }

        input[type="checkbox"] {
            display: none;
        }

        .checkbox-group label {
            margin-bottom: -15px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .checkbox-group label:before {
            content: " ";
            display: inline-block;
            width: 18px;
            height: 18px;
            margin-right: 10px;
            border: 2px solid #000;
            border-radius: 3px;
            vertical-align: middle;
            cursor: pointer;
        }

        .checkbox-group input[type="checkbox"]+label:before {
            background-color: #fff;
            margin-bottom: 5px;
        }

        .checkbox-group input[type="checkbox"]:checked+label:before {
            background-color: #000;
            font-family: "FontAwesome";
            content: "\f00c";
            color: #fff;
            text-align: center;
        }

        .checkbox-group input[type="checkbox"]:disabled+label:before {
            text-decoration: line-through;
            color: #999;
            cursor: not-allowed;
        }

        .checkbox-group input[type="checkbox"]:disabled+label {
            color: #999;
            cursor: not-allowed;
        }

        .checkbox-group input[type="checkbox"]:checked+label:after {
            display: block;
            color: #fff;
            font-size: 16px;
            text-align: center;
            line-height: 18px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
        }

        #quota-2R-dropdown,
        #unlimited-2R-dropdown,
        #quota-4R-dropdown,
        #unlimited-4R-dropdown,
        #unlimited-360-dropdown {
            display: none;
        }

        .toast {
            background-color: #f44336;
            color: #fff;
            font-size: 16px;
            padding: 10px;
            display: none;
            position: absolute;
            text-align: center;
            z-index: 999;
            border-radius: 15px;
            top: 15%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.2);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            animation: notificationFadeIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        @keyframes notificationFadeIn {
            0% {
                transform: translate(-50%, -50%) scale(0.2);
                opacity: 0;
            }

            100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }
        }

        @keyframes notificationFadeOut {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }

            100% {
                transform: translate(-50%, -50%) scale(0.2);
                opacity: 0;
            }
        }

        .notification {
            position: fixed;
            font-family: "Poppins", sans-serif;
            font-size: 18px;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f44336;
            color: #fff;
            padding: 15px 20px;
            border-radius: 15px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .notification.show {
            opacity: 1;
        }

        .hidden {
            display: none;
        }

        .input-container.quota-unlimited {
            display: flex;
            align-items: center;
        }

        .radio-quota-unlimited {
            display: flex;
            align-items: center;
            margin-left: 110px;
            margin-top: -18px;
        }

        .radio-quota-unlimited input[type="radio"] {
            display: none;
        }

        .radio-quota-unlimited label {
            display: flex;
            align-items: center;
        }

        .radio-quota-unlimited label:before {
            font-family: "FontAwesome";
            content: "\f096";
            width: 20px;
            height: 20px;
            margin-left: 10px;
            display: flex;
            align-items: center;
        }

        .radio-quota-unlimited input[type="radio"]:checked+label:before {
            content: "\f046";
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a class="navbar-logo" href="dashboard.php"><img src="assets/Logo Angkasa Photobooth.png" alt="Logo"></a>
        <ul class="navbar-menu">
            <li><a href="dashboard.php" id="Home">Home</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" id="Pemesanan" class="dropbtn active-link">Pemesanan</a>
                <div class="dropdown-content">
                    <a href="daerahjember.php">Daerah Jember</a>
                    <a href="diluarjember.php">Diluar Jember</a>
                    <a href="sponsor.php">Sponsor</a>
                </div>
            </li>
            <li><a href="ourpackage.php" id="Our-Package">Our Package</a></li>
            <li><a href="gallery.php" id="Gallery">Gallery</a></li>
            <li><a href="tentang.php" id="Tentang-Kami">Tentang Kami</a></li>
        </ul>
        <a class="admin-link" href="Login.php">Anda Admin?</a>
    </div>

    <form method="POST" action="" enctype="multipart/form-data">
        <div class="pack-jember">
            <div class="container-pemesanan">
                <div id="step-1">
                    <h1>Pemesanan Didaerah Jember</h1>
                    <div class="input-container">
                        <label for="name">Nama Lengkap:</label>
                        <input type="text" id="name" name="txt_nama" placeholder="Contoh: Jhon Doe" required>
                    </div>

                    <div class="input-container">
                        <label for="phone">Nomer Telepon:</label>
                        <input type="tel" id="phone" name="txt_phone" placeholder="Contoh: 081222333444" required>
                    </div>

                    <div class="input-container">
                        <label for="address">Alamat Acara:</label>
                        <input type="text" id="address" name="txt_address"
                            placeholder="Contoh: Jl. Mastrip, Kec. Sumbersari, Jember" required>
                    </div>

                    <div class="toast" id="address-warning">Alamat harus mencantumkan kata "Jember".</div>
                    <div class="input-container">
                        <label for="date">Tanggal Acara:</label>
                        <input type="date" id="date" name="txt_date" required>
                    </div>
                    <button class="next-button" id="next-1" disabled>Selanjutnya</button>
                </div>

                <div id="step-2" style="display: none;">
                    <h1>Pemesanan Didaerah Jember</h1>
                    <div class="input-container">
                        <label for="package">Package selection:</label>
                        <select id="package" name="txt_package">
                            <option value="" disabled selected>Pilih Paket</option>
                            <option value="Self Photobox">Self Photobox</option>
                            <option value="Self Photo">Self Photo</option>
                            <option value="Manual Photobooth">Manual Photobooth</option>
                            <option value="360 Videobooth">360 Videobooth</option>
                        </select>
                    </div>

                    <div class="input-container checkbox-group">
                        <h3>Pilih Layout:</h3>
                        <div class="checkbox-container" id="checkbox">
                            <input type="checkbox" id="paperframe-4r" name="paket-layout[]" value="1">
                            <label for="paperframe-4r">PaperFrame 4R</label>
                            <br>
                            <input type="checkbox" id="paperframe-2r" name="paket-layout[]" value="2">
                            <label for="paperframe-2r">PaperFrame 2R</label>
                            <br>
                            <input type="checkbox" id="layout-360" name="paket-layout[]" value="3">
                            <label for="layout-360">360 Videobooth</label>
                        </div>
                    </div>

                    <div class="input-container quota-unlimited" id="quota-unlimited" style="display: none;">
                        <label>Pilih Paket:</label>
                        <div class="radio-quota-unlimited">
                            <input type="radio" id="quota" name="paket" value="quota">
                            <label for="quota">Quota</label>
                            <input type="radio" id="unlimited" name="paket" value="unlimited">
                            <label for="unlimited">Unlimited</label>
                        </div>
                    </div>

                    <div class="input-container" id="quota-2R-dropdown">
                        <label for="quota-2R">Quota PaperFrame 2R:</label>
                        <select name="quota[2]" id="quota-2R">
                            <option value="" disabled selected>Pilih Quota</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM quota where id_layout='1'");

                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <option value="<?= $data['id_quota'] ?>">
                                    <?= $data['nama_quota'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-container" id="unlimited-2R-dropdown">
                        <label for="unlimited-2R">Unlimited PaperFrame 2R:</label>
                        <select name="unlimited[2]" id="unlimited-2R">
                            <option value="" disabled selected>Pilih Unlimited</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM unlimited where id_layout='1'");

                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <option value="<?= $data['id_unlimited'] ?>">
                                    <?= $data['nama_unlimited'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-container" id="quota-4R-dropdown">
                        <label for="quota-4R">Quota PaperFrame 4R:</label>
                        <select name="quota[1]" id="quota-4R">
                            <option value="" disabled selected>Pilih Quota</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM quota where id_layout='2'");

                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <option value="<?= $data['id_quota'] ?>">
                                    <?= $data['nama_quota'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-container" id="unlimited-4R-dropdown">
                        <label for="unlimited-4R">Unlimited PaperFrame 4R:</label>
                        <select name="unlimited[1]" id="unlimited-4R">
                            <option value="" disabled selected>Pilih Unlimited</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM unlimited where id_layout='2'");

                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <option value="<?= $data['id_unlimited'] ?>">
                                    <?= $data['nama_unlimited'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-container" id="unlimited-360-dropdown">
                        <label for="unlimited-360">Unlimited 360 Videobooth:</label>
                        <select name="unlimited[3]" id="unlimited-360">
                            <option value="" disabled selected>Pilih Unlimited</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM unlimited where id_layout='3'");

                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <option value="<?= $data['id_unlimited'] ?>">
                                    <?= $data['nama_unlimited'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <button class="prev-button" id="prev-2">Kembali</button>
                    <button class="next-button" id="next-2" disabled>Selanjutnya</button>
                </div>

                <div id="step-3" style="display: none;">
                    <h1>Pemesanan Didaerah Jember</h1>
                    <div class="input-container">
                        <label for="metode-pembayaran">Pilih Metode Pembayaran:</label>
                        <select id="payment" name="txt_payment" onchange="showPaymentDetails()">
                            <option value="" disabled selected>Pilih Pembayaran</option>
                            <option value="Dana">Dana</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                        </select>
                    </div>

                    <div id="danaDetails" class="hidden">
                        <p id="nomorDana"></p>
                    </div>

                    <div id="bankDetails" class="hidden">
                        <p id="nomorRekening"></p>
                    </div>

                    <div class="input-container">
                        <label for="proof">Kirim Bukti Pembayaran:</label>
                        <input type="file" id="proof" name="gambar" required>
                    </div>
                    <button class="prev-button" id="prev-3">Kembali</button>
                    <button class="submit-button" id="submit" type="submit" name="submit" disabled>Pesan</button>
                </div>
            </div>
        </div>
    </form>

    <div id="circularcursor"></div>

    <div class="notification" id="notification"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function toggleVisibility() {
                var radioButtonValue = document.querySelector("input[name='paket']:checked").value;
                var layoutCheckbox4R = document.getElementById("paperframe-4r");
                var layoutCheckbox2R = document.getElementById("paperframe-2r");
                var is4RChecked = layoutCheckbox4R.checked;
                var is2RChecked = layoutCheckbox2R.checked;

                if (radioButtonValue === "quota") {
                    document.getElementById("quota-2R-dropdown").style.display = is2RChecked ? "block" : "none";
                    document.getElementById("unlimited-2R-dropdown").style.display = "none";
                    document.getElementById("quota-4R-dropdown").style.display = is4RChecked ? "block" : "none";
                    document.getElementById("unlimited-4R-dropdown").style.display = "none";
                } else if (radioButtonValue === "unlimited") {
                    document.getElementById("quota-2R-dropdown").style.display = "none";
                    document.getElementById("unlimited-2R-dropdown").style.display = is2RChecked ? "block" : "none";
                    document.getElementById("quota-4R-dropdown").style.display = "none";
                    document.getElementById("unlimited-4R-dropdown").style.display = is4RChecked ? "block" : "none";
                }
            }

            var radioButtons = document.getElementsByName("paket");

            radioButtons.forEach(function (radioButton) {
                radioButton.addEventListener("change", function () {
                    toggleVisibility();
                });
            });

            var layoutCheckboxes = document.getElementById("checkbox");

            layoutCheckboxes.addEventListener("change", function () {
                toggleVisibility();
            });

            var initialSelectedRadio = document.querySelector("input[name='paket']:checked");
            if (initialSelectedRadio) {
                toggleVisibility();
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var paperframe4rCheckbox = document.getElementById("paperframe-4r");
            var paperframe2rCheckbox = document.getElementById("paperframe-2r");
            var layout360Checkbox = document.getElementById("layout-360");
            var quotaUnlimitedDropdown = document.querySelector(".quota-unlimited");
            var unlimited360Dropdown = document.getElementById("unlimited-360-dropdown");

            paperframe4rCheckbox.addEventListener("click", function () {
                if (paperframe4rCheckbox.checked) {
                    quotaUnlimitedDropdown.style.display = "block";
                    unlimited360Dropdown.style.display = "none";
                } else {
                    quotaUnlimitedDropdown.style.display = "none";
                }
            });

            paperframe2rCheckbox.addEventListener("click", function () {
                if (paperframe2rCheckbox.checked) {
                    quotaUnlimitedDropdown.style.display = "block";
                    unlimited360Dropdown.style.display = "none";
                } else {
                    quotaUnlimitedDropdown.style.display = "none";
                }
            });

            layout360Checkbox.addEventListener("click", function () {
                if (layout360Checkbox.checked) {
                    quotaUnlimitedDropdown.style.display = "none";
                    unlimited360Dropdown.style.display = "block";
                } else {
                    unlimited360Dropdown.style.display = "none";
                }
            });
        });
    </script>

    <script>
        function showPaymentDetails() {
            var paymentMethod = document.getElementById("payment").value;
            var nomorDana = document.getElementById("nomorDana");
            var nomorRekening = document.getElementById("nomorRekening");

            nomorDana.parentNode.classList.add("hidden");
            nomorRekening.parentNode.classList.add("hidden");

            if (paymentMethod === "Dana") {
                nomorDana.innerHTML = "Nomor Dana: 123456789";
                nomorDana.parentNode.classList.remove("hidden");
            } else if (paymentMethod === "Transfer Bank") {
                nomorRekening.innerHTML = "Nomor Rekening: 987654321";
                nomorRekening.parentNode.classList.remove("hidden");
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const WarningMessage = urlParams.get('WarningMessage');

            if (WarningMessage) {
                const notification = document.getElementById('notification');
                notification.innerText = WarningMessage;
                notification.style.display = 'block';

                setTimeout(function () {
                    notification.classList.add('show');
                }, 100);

                setTimeout(function () {
                    notification.classList.remove('show');
                    setTimeout(function () {
                        notification.style.display = 'none';
                    }, 500);
                }, 5000);
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addressInput = document.getElementById('address');
            const addressWarning = document.getElementById('address-warning');
            const nextButton = document.getElementById('next-1');

            addressInput.addEventListener('blur', function () {
                const addressValue = addressInput.value.toLowerCase();
                if (!addressValue.includes('jember')) {
                    addressWarning.style.display = 'inline-block';
                    nextButton.disabled = true;
                } else {
                    addressWarning.style.display = 'none';
                    nextButton.disabled = false;
                }
            });
        });
    </script>

    <script>
        const nextButton1 = document.getElementById("next-1");
        const nextButton2 = document.getElementById("next-2");
        const nextButton3 = document.getElementById("submit");

        const step1Inputs = [document.getElementById("name"), document.getElementById("phone"), document.getElementById("address"), document.getElementById("date")];
        const step2Inputs = [document.getElementById("package")];
        const step3Inputs = [document.getElementById("payment"), document.getElementById("proof")];

        function isStepFormValid(inputs) {
            return inputs.every(input => input.value.trim() !== "");
        }

        step1Inputs.forEach(input => {
            input.addEventListener("input", () => {
                nextButton1.disabled = !isStepFormValid(step1Inputs);
            });
        });

        step2Inputs.forEach(input => {
            input.addEventListener("input", () => {
                nextButton2.disabled = !isStepFormValid(step2Inputs);
            });
        });

        step3Inputs.forEach(input => {
            input.addEventListener("input", () => {
                nextButton3.disabled = !isStepFormValid(step3Inputs);
            });
        });

        $(document).ready(function () {
            $(document).on('mousemove', function (e) {
                $('#circularcursor').css({
                    left: e.pageX,
                    top: e.pageY
                });
            })
        });

        document.addEventListener("DOMContentLoaded", function () {
            const step1Form = document.getElementById("step-1");
            const step2Form = document.getElementById("step-2");
            const step3Form = document.getElementById("step-3");

            const nextButton1 = document.getElementById("next-1");
            const nextButton2 = document.getElementById("next-2");
            const prevButton2 = document.getElementById("prev-2");
            const nextButton3 = document.getElementById("next-3");
            const prevButton3 = document.getElementById("prev-3");

            nextButton1.addEventListener("click", function (e) {
                e.preventDefault();
                step1Form.style.display = "none";
                step2Form.style.display = "block";
            });

            nextButton2.addEventListener("click", function (e) {
                e.preventDefault();
                step2Form.style.display = "none";
                step3Form.style.display = "block";
            });

            prevButton2.addEventListener("click", function (e) {
                e.preventDefault();
                step2Form.style.display = "none";
                step1Form.style.display = "block";
            });

            prevButton3.addEventListener("click", function (e) {
                e.preventDefault();
                step3Form.style.display = "none";
                step2Form.style.display = "block";
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const packageDropdown = document.getElementById("package");
            const paperframe4rCheckbox = document.getElementById("paperframe-4r");
            const paperframe2rCheckbox = document.getElementById("paperframe-2r");
            const layout360Checkbox = document.getElementById("layout-360");

            packageDropdown.addEventListener("change", function () {
                const selectedPackage = packageDropdown.value;

                paperframe4rCheckbox.disabled = true;
                paperframe2rCheckbox.disabled = true;
                layout360Checkbox.disabled = true;

                if (selectedPackage === "Self Photobox" || selectedPackage === "Self Photo" || selectedPackage === "Manual Photobooth") {
                    paperframe4rCheckbox.disabled = false;
                    paperframe2rCheckbox.disabled = false;
                } else if (selectedPackage === "360 Videobooth") {
                    layout360Checkbox.disabled = false;
                }
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</body>

</html>