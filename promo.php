<?php
// $koneksi = mysqli_connect("localhost", "root", "", "angkasa");

// if ($koneksi->connect_error) {
//     die("Koneksi gagal: " . $koneksi->connect_error);
// }

// if (isset($_POST['submit'])) {
//     $namacustomer = isset($_POST['txt_nama']) ? $_POST['txt_nama'] : '';
//     $nohp = isset($_POST['txt_phone']) ? $_POST['txt_phone'] : '';
//     $alamatacara = isset($_POST['txt_address']) ? $_POST['txt_address'] : '';
//     $tanggalacara = isset($_POST['txt_date']) ? $_POST['txt_date'] : '';
//     $pilihanpackage = isset($_POST['txt_package']) ? $_POST['txt_package'] : '';
//     $pilihpaketlayout = isset($_POST['paket-layout']) ? $_POST['paket-layout'] : '';
//     $quota = isset($_POST['quota']) ? $_POST['quota'] : '';
//     $unlimited = isset($_POST['unlimited']) ? $_POST['unlimited'] : '';
//     $pilihanpembayaran = isset($_POST['txt_payment']) ? $_POST['txt_payment'] : '';
//     // Pengecekan apakah tanggal yang dipilih lebih kecil dari tanggal hari ini
//     $today = date("Y-m-d");
//     if ($tanggalacara < $today) {
//         header("Location: daerahjember.php?WarningMessage=Anda tidak dapat memilih tanggal yang telah berlalu!");
//         exit();
//     } else {
//         $check_date_query = "SELECT id_pemesanan FROM pemesanan WHERE tanggal_acara = '$tanggalacara'";
//         $check_date_result = mysqli_query($koneksi, $check_date_query);



//         if (mysqli_num_rows($check_date_result) > 0) {
//             header("Location: daerahjember.php?WarningMessage=Tanggal tersebut telah dipesan! Silakan pilih tanggal lain.");
//             exit();
//         } else {
//             $gambar = upload();
//             if (!$gambar) {
//                 return false;
//             }


//             $query_customer = "INSERT INTO customer (id_customer, nama_cust, no_hp) VALUES ('', '$namacustomer', '$nohp')";
//             $result_customer = mysqli_query($koneksi, $query_customer);
//             if ($result_customer) {
//                 $last_inserted_customer_id = mysqli_insert_id($koneksi);
//                 $query_pemesanan = "INSERT INTO pemesanan (id_pemesanan,id_customer,alamat_acara, tanggal_acara, nama_package,metode_bayar, bukti_bayar) VALUES ('','$last_inserted_customer_id','$alamatacara', '$tanggalacara', '$pilihanpackage',  '$pilihanpembayaran', '$gambar')";
//                 $result_pemesanan = mysqli_query($koneksi, $query_pemesanan);
//                 if ($result_pemesanan) {
//                     $last_inserted_pemesanan_id = mysqli_insert_id($koneksi);
//                     foreach ($pilihpaketlayout as $key => $value) {
//                         if ($_POST['paket'] == "quota") {
//                             $query_detail_pemesanan = "INSERT INTO detail_pemesanan (id_pemesanan, id_layout, id_quota, id_unlimited) VALUES ('$last_inserted_pemesanan_id','$value', '$quota[$value]', null)";
//                             $result_detail_pemesanan = mysqli_query($koneksi, $query_detail_pemesanan);
//                         } else if (($_POST["paket"] == "unlimited")) {
//                             $query_detail_pemesanan = "INSERT INTO detail_pemesanan (id_pemesanan, id_layout, id_quota, id_unlimited) VALUES ('$last_inserted_pemesanan_id','$value', null, '$unlimited[$value]')";
//                             $result_detail_pemesanan = mysqli_query($koneksi, $query_detail_pemesanan);
//                         }
//                     }

//                     if ($result_detail_pemesanan) {
//                         $koneksi->commit();
//                         header("Location: Dashboard.php?successMessage=Pemesanan telah berhasil.");
//                         exit();
//                     } else {
//                         $conn->rollback();
//                         $error = "Pemesanan gagal. Silahkan coba lagi nanti.";
//                     }

//                 }
//             }
//         }
//     }
// } else {
//     $error = "Gagal menyisipkan data ke tabel layout.";
// }
// function upload()
// {
//     $namaFile = $_FILES['gambar']['name'];
//     $ukuranFile = $_FILES['gambar']['size'];
//     $error = $_FILES['gambar']['error'];
//     $tmpName = $_FILES['gambar']['tmp_name'];

//     if ($error === 4) {
//         header("Location: daerahjember.php?WarningMessage=pilih gambar terlebih dahulu!");
//         exit();
//     }

//     $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
//     $ekstensiGambar = explode('.', $namaFile);
//     $ekstensiGambar = strtolower(end($ekstensiGambar));
//     if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
//         header("Location: daerahjember.php?WarningMessage=Yang anda upload bukan gambar!");
//         exit();
//     }

//     if ($ukuranFile > 1000000) {
//         header("Location: daerahjember.php?WarningMessage=ukuran gambar terlalu besar!");
//         exit();
//     }
//     $namaFileBaru = uniqid();
//     $namaFileBaru .= '.';
//     $namaFileBaru .= $ekstensiGambar;
//     move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
//     return $namaFileBaru;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/Logo Web.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Angkasa | Pemesanan Page</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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

        .header {
            margin-top: 100px;
            justify-content: center;
            align-items: center;
        }

        .container-pemesanan {
            width: 450px;
            padding: 25px;
            background-color: #EBECF0 0.5;
            backdrop-filter: blur(5px);
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

        #nama-promo {
            border: none;
            background: none;
            box-shadow: none;
        }

        #harga-promo {
            border: none;
            background: none;
            box-shadow: none;
        }

        button {
            background-color: #131313;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            cursor: pointer;
            width: 100%;
            font-weight: 800;
            box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
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
            background-color: #EBECF0;
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
            width: 350px;
            font-size: 16px;
            padding: 10px;
            display: none;
            position: absolute;
            text-align: center;
            z-index: 999;
            border-radius: 15px;
            top: 5px;
            left: 50%;
            transform: translate(-50%) scale(0.2);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            animation: notificationFadeIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        @keyframes notificationFadeIn {
            0% {
                transform: translate(-50%) scale(0.2);
                opacity: 0;
            }

            100% {
                transform: translate(-50%) scale(1);
                opacity: 1;
            }
        }

        @keyframes notificationFadeOut {
            0% {
                transform: translate(-50%) scale(1);
                opacity: 1;
            }

            100% {
                transform: translate(-50%) scale(0.2);
                opacity: 0;
            }
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

        #nomorDana {
            font-size: 16px;
            font-weight: 800;
        }

        #nomorRekening {
            font-size: 16px;
            font-weight: 800;
        }

        .harga-paket h3 {
            font-size: 20px;
            font-weight: 800;
        }

        .harga-paket #total-price {
            font-size: 17px;
            font-weight: 800;
        }

        #quota:disabled+label {
            color: #999;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="pack-jember" data-aos="fade-down" data-aos-easing="ease" data-aos-duration="700">
            <div class="container-pemesanan">
                <h1>Pemesanan Didaerah Jember</h1>
                <div class="input-container">
                    <input type="text" id="nama-promo" value="<?php echo $nama_promo; ?>" readonly>
                    <input type="text" id="harga-promo" value="<?php echo $harga_promo; ?>" readonly>
                </div>
                <div class="input-container">
                    <label for="name">Nama Lengkap:</label>
                    <input type="text" id="name" name="txt_nama" placeholder="Contoh: Jhon Doe" required>
                </div>

                <div class="input-container">
                    <label for="phone">Nomer Telepon:</label>
                    <input type="tel" id="phone" name="txt_phone" placeholder="Contoh: 081222333444"
                        oninput="validateNumberInput(event)" required>
                </div>

                <div class="input-container">
                    <label for="address">Alamat Acara:</label>
                    <input type="text" id="address" name="txt_address"
                        placeholder="Contoh: Jl. Mastrip, Kec. Sumbersari, Jember" required>
                </div>

                <div class="toast" id="address-warning">Alamat harus mencantumkan nama alamat dengan kata "Jember".
                </div>
                <div class="input-container">
                    <label for="date">Tanggal Acara:</label>
                    <input type="date" id="date" name="txt_date" required>
                </div>

                <div class="harga-paket">
                    <h3>Total Pembayaran:</h3>
                    <p id="total-price">Rp. 0,-</p>
                </div>

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
                <button class="submit-button" id="submit" type="submit" name="submit">Pesan</button>
            </div>
        </div>
        </div>
    </form>

    <div class="notification" id="notification"></div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    <script>
        function validateNumberInput(event) {
            var inputValue = event.target.value;
            var numericValue = inputValue.replace(/\D/g, '');
            event.target.value = numericValue;
        }
    </script>

    <script>
        function updateTotal() {
            var total = 0;

            ['quota-2R', 'quota-4R'].forEach(function (dropdownId) {
                var selectedOption = document.getElementById(dropdownId).value;
                if (selectedOption !== "") {
                    total += parseFloat(document.getElementById(dropdownId).options[document.getElementById(dropdownId).selectedIndex].getAttribute('data-price'));
                }
            });

            ['unlimited-2R', 'unlimited-4R', 'unlimited-360'].forEach(function (dropdownId) {
                var selectedOption = document.getElementById(dropdownId).value;
                if (selectedOption !== "") {
                    total += parseFloat(document.getElementById(dropdownId).options[document.getElementById(dropdownId).selectedIndex].getAttribute('data-price'));
                }
            });

            var formattedTotal = "Rp. " + total.toLocaleString('id-ID') + ",-";
            document.getElementById('total-price').innerHTML = formattedTotal;
        }
    </script>

    <script>
        function handleCheckboxClick(checkbox) {
            const checkboxes = document.querySelectorAll('.checkbox-group input[type="checkbox"]');

            checkboxes.forEach((cb) => {
                if (cb !== checkbox) {
                    cb.disabled = true;
                }
            });

            checkbox.disabled = false;
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const packageDropdown = document.getElementById("package");
            const paperframe4rCheckbox = document.getElementById("paperframe-4r");
            const paperframe2rCheckbox = document.getElementById("paperframe-2r");
            const layout360Checkbox = document.getElementById("layout-360");
            const quotaRadio = document.getElementById("quota");

            quotaRadio.disabled = true;

            layout360Checkbox.addEventListener("change", function () {
                quotaRadio.disabled = layout360Checkbox.checked;
            });

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

                    quotaRadio.disabled = true;
                } else {

                    quotaRadio.disabled = !(paperframe4rCheckbox.checked || paperframe2rCheckbox.checked);
                }

                if (layout360Checkbox.checked) {
                    quotaRadio.disabled = false;
                }
            });

            paperframe4rCheckbox.addEventListener("change", function () {
                quotaRadio.disabled = !paperframe4rCheckbox.checked;
            });

            paperframe2rCheckbox.addEventListener("change", function () {
                quotaRadio.disabled = !paperframe2rCheckbox.checked;
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function toggleVisibility() {
                var radioButtonValue = document.querySelector("input[name='paket']:checked").value;
                var layoutCheckbox4R = document.getElementById("paperframe-4r");
                var layoutCheckbox2R = document.getElementById("paperframe-2r");
                var layoutCheckbox360 = document.getElementById("layout-360");
                var is4RChecked = layoutCheckbox4R.checked;
                var is2RChecked = layoutCheckbox2R.checked;
                var is360Checked = layoutCheckbox360.checked;

                if (radioButtonValue === "quota") {
                    document.getElementById("quota-2R-dropdown").style.display = is2RChecked ? "block" : "none";
                    document.getElementById("unlimited-2R-dropdown").style.display = "none";
                    document.getElementById("quota-4R-dropdown").style.display = is4RChecked ? "block" : "none";
                    document.getElementById("unlimited-4R-dropdown").style.display = "none";
                    document.getElementById("quota").disabled = false;
                } else if (radioButtonValue === "unlimited") {
                    document.getElementById("quota-2R-dropdown").style.display = "none";
                    document.getElementById("unlimited-2R-dropdown").style.display = is2RChecked ? "block" : "none";
                    document.getElementById("quota-4R-dropdown").style.display = "none";
                    document.getElementById("unlimited-4R-dropdown").style.display = is4RChecked ? "block" : "none";
                    document.getElementById("quota").disabled = is360Checked;
                    document.getElementById("unlimited-360-dropdown").style.display = is360Checked ? "block" : "none";
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
                    quotaUnlimitedDropdown.style.display = "block";
                    unlimited360Dropdown.style.display = "none";
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
                nomorDana.innerHTML = "Nomor Dana (Yanuar Ardhika): 085933648537";
                nomorDana.parentNode.classList.remove("hidden");
            } else if (paymentMethod === "Transfer Bank") {
                nomorRekening.innerHTML = "Nomor Rekening Mandiri (YANUAR ARDHIKA): 1430026836864";
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

            addressInput.addEventListener('blur', function () {
                const addressValue = addressInput.value.toLowerCase();
                if (!addressValue.includes('jember')) {
                    addressWarning.style.display = 'inline-block';
                } else {
                    addressWarning.style.display = 'none';
                }
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</body>

</html>