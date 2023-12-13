<?php
$koneksi = mysqli_connect("localhost", "tifbmyho_angkasa", "@JTIpolije2023", "tifbmyho_angkasa");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
if (isset($_POST['submit'])) {
    $status = isset($_POST['txt_status']) ? $_POST['txt_status'] : '';
    $namacustomer = isset($_POST['txt_name']) ? $_POST['txt_name'] : '';
    $nohp = isset($_POST['txt_phone']) ? $_POST['txt_phone'] : '';
    $alamatacara = isset($_POST['txt_address']) ? $_POST['txt_address'] : '';
    $tanggalacara = isset($_POST['date']) ? $_POST['date'] : '';

    $today = date("Y-m-d");
    if ($tanggalacara < $today) {
        header("Location: ./sponsor.php?WarningMessage=Anda tidak dapat memilih tanggal yang telah berlalu!");
        exit();
    } else {
        $check_date_query = "SELECT id_pemesanan FROM pemesanan WHERE tanggal_acara = '$tanggalacara'";
        $check_date_result = mysqli_query($koneksi, $check_date_query);



        if (mysqli_num_rows($check_date_result) > 0) {
            header("Location: ./sponsor.php?WarningMessage=Tanggal tersebut telah dipesan! Silakan pilih tanggal lain.");
            exit();
        } else {
            $proposal = upload();
            if (!$proposal) {
                return false;
            }

            $query_customer = "INSERT INTO customer (id_customer, nama_cust, no_hp) VALUES ('', '$namacustomer', '$nohp')";
            $result_customer = mysqli_query($koneksi, $query_customer);
            if ($result_customer) {
                $last_inserted_customer_id = mysqli_insert_id($koneksi);
                $query_pemesanan = "INSERT INTO pemesanan (id_pemesanan,id_customer,alamat_acara, tanggal_acara,proposal,status) VALUES ('','$last_inserted_customer_id','$alamatacara', '$tanggalacara', '$proposal','$status')";
                $result_pemesanan = mysqli_query($koneksi, $query_pemesanan);
                if ($result_pemesanan) {
                    $koneksi->commit();
                    header("Location: ./Dashboard.php?successMessage=Pemesanan Berhasil.");
                    exit();
                } else {
                    $conn->rollback();
                    $error = "Pemesanan Gagal. Silahkan Coba Lagi Nanti.";
                }
            }
        }
    }
}
function upload()
{
    $namaFile = $_FILES['proposal']['name'];
    $ukuranFile = $_FILES['proposal']['size'];
    $error = $_FILES['proposal']['error'];
    $tmpName = $_FILES['proposal']['tmp_name'];

    if ($error === 4) {
        header("Location: ./sponsor.php?WarningMessage=pilih proposal terlebih dahulu!");
        exit();
    }

    $ekstensiproposalValid = ['pdf', 'word'];
    $ekstensiproposal = explode('.', $namaFile);
    $ekstensiproposal = strtolower(end($ekstensiproposal));
    if (!in_array($ekstensiproposal, $ekstensiproposalValid)) {
        header("Location: ./sponsor.php?WarningMessage=Yang anda upload bukan proposal!");
        exit();
    }

    if ($ukuranFile > 5000000) {
        header("Location: ./sponsor.php?WarningMessage=ukuran proposal terlalu besar!");
        exit();
    }
    $namaFileBaru = time();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiproposal;
    move_uploaded_file($tmpName, 'proposal/' . $namaFileBaru);
    return $namaFileBaru;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/Logo Web.png">
    <title>Angkasa | Sponsor Page</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #EBECF0;
        }

        html {
            scroll-behavior: smooth;
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
            background-color: #EBECF0 0.5;
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

        .container-pemesanan {
            width: 450px;
            padding: 10px;
            font-family: "Poppins", sans-serif;
        }

        .container-pemesanan h3 {
            text-align: center;
        }

        .container-pemesanan h1 {
            font-size: 28px;
            text-align: center;
            color: #000;
            font-weight: 800;
            margin-bottom: 35px;
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

        .input-container input,
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
            box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
            transition: background-color 0.3s;
        }

        button:disabled {
            background-color: #ccc;
            color: #888;
            cursor: not-allowed;
        }

        .submit-button {
            background-color: #4CAF50;
            margin-top: 10px;
        }

        .proposal-container {
            position: relative;
            width: 300px;
            height: 150px;
            background-color: #EBECF0;
            border: 2px dashed #000;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin: 0 auto;
        }

        .input-proposal {
            font-size: 16px;
            color: #777;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-proposal i {
            font-size: 30px;
            margin-bottom: 10px;
        }

        #proposal {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        .file-info {
            margin-top: 10px;
            text-align: center;
            font-weight: 800;
        }

        .notification {
            position: fixed;
            font-family: "Poppins", sans-serif;
            font-size: 18px;
            top: 35px;
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
    </style>
</head>

<body>
    <div class="navbar">
        <a class="navbar-logo" href="Dashboard.php"><img src="assets/Logo Angkasa Photobooth.png" alt="Logo"></a>
        <ul class="navbar-menu">
            <li><a href="Dashboard.php" id="Home">Home</a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" id="Pemesanan" class="active-link" class="dropbtn">Pemesanan</a>
                <div class="dropdown-content">
                    <a href="./daerahjember.php">Daerah Jember</a>
                    <a href="./diluarjember.php">Diluar Jember</a>
                    <a href="./sponsor.php">Sponsor</a>
                </div>
            </li>
            <li><a href="Ourpackage.php" id="Our-Package">Our Package</a></li>
            <li><a href="Gallery.php" id="Gallery">Gallery</a></li>
            <li><a href="Tentang.php" id="Tentang-Kami">Tentang Kami</a></li>
        </ul>
        <a class="admin-link" href="Login.php">Anda Admin?</a>
    </div>

    <div class="notification" id="notification"></div>

    <form method="POST" action="" enctype="multipart/form-data">
        <div class="pack-sponsor" data-aos="fade-down" data-aos-easing="ease" data-aos-duration="700">
            <div class="container-pemesanan">
                <h1>Form Pengajuan Sponsor</h1>
                <div class="input-container">
                    <input type="hidden" name="txt_status" value="Belum">
                    <label for="name">Nama Lengkap:</label>
                    <input type="text" id="name" name="txt_name" placeholder="Contoh: Jhon Doe" required>
                </div>

                <div class="input-container">
                    <label for="phone">Nomer Telepon:</label>
                    <input type="tel" id="phone" name="txt_phone" placeholder="Contoh: 081222333444"
                        oninput="validateNumberInput(event)" required>
                </div>

                <div class="input-container">
                    <label for="date">Tanggal Acara:</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="proposal-container">
                    <label for="proposal" class="input-proposal">
                        <i class="fas fa-file-pdf"></i>
                        Drop Here or Click to Upload PDF
                    </label>
                    <input type="file" id="proposal" name="proposal" accept=".pdf" required>
                    <div class="file-info" id="fileInfo"></div>
                </div>
                <button class="submit-button" type="submit" id="submit" name="submit" disabled>Pesan</button>
            </div>
        </div>
    </form>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const inputs = document.querySelectorAll('input');

            const submitButton = document.getElementById('submit');

            inputs.forEach(function (input) {
                input.addEventListener('input', function () {
                    const allInputsFilled = [...inputs].every(function (input) {
                        return input.value.trim() !== '';
                    });

                    submitButton.disabled = !allInputsFilled;
                });
            });
        });
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
        function validateNumberInput(event) {
            var inputValue = event.target.value;
            var numericValue = inputValue.replace(/\D/g, '');
            event.target.value = numericValue;
        }
    </script>

    <script>
        const fileInput = document.getElementById('proposal');
        const fileInfo = document.getElementById('fileInfo');

        fileInput.addEventListener('change', function () {
            const files = fileInput.files;
            if (files.length > 0) {
                const fileName = files[0].name;
                const fileExtension = fileName.split('.').pop().toLowerCase();

                fileInfo.innerHTML = `${fileName}`;
            } else {
                fileInfo.innerHTML = '';
            }
        });
    </script>

    <script>
        document.getElementById("proposal").addEventListener("change", function (event) {
            const fileName = event.target.files[0].name;
            document.querySelector(".input-label").textContent = fileName;
        });
    </script>
</body>

</html>