<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/Logo Web.png">
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
            font-family: "Poppins", sans-serif;
        }

        .container-pemesanan h1 {
            font-size: 28px;
            text-align: center;
            color: #000;
            font-weight: 800;
            margin-bottom: 35px;
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
            <li><a href="gallery.php" id="Gallery" >Gallery</a></li>
            <li><a href="tentang.php" id="Tentang-Kami" >Tentang Kami</a></li>
        </ul>
        <a class="admin-link" href="Login.php">Anda Admin?</a>
    </div>

    <div id="circularcursor"></div>

    <div class="pack-diluarjember" data-aos="fade-down" data-aos-easing="ease" data-aos-duration="700">
        <div class="container-pemesanan">
            <form id="step-1">
                <h1>Pemesanan Diluar Daerah Jember</h1>
                <div class="input-container">
                    <label for="name">Nama Lengkap:</label>
                    <input type="text" id="name" name="name" placeholder="Contoh: Jhon Doe" required>
                </div>
                <div class="input-container">
                    <label for="phone">Nomer Telepon:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Contoh: 081222333444" required>
                </div>
                <div class="input-container">
                    <label for="address">Alamat Acara:</label>
                    <input type="text" id="address" name="address" placeholder="Contoh: Jl. Walikota Mustajab No.59, Surabaya" required>
                </div>
                <div class="input-container">
                    <label for="date">Tanggal Acara:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <button class="next-button" id="next-1" disabled>Selanjutnya</button>
            </form>

            <form id="step-2" style="display: none;">
                <h1>Pemesanan Diluar Daerah Jember</h1>
                <div class="input-container">
                    <label for="package">Package Selection:</label>
                    <select id="package" name="package">
                        <option value="" disabled selected>Pilih Paket</option>
                        <option value="Self Photobox">Self Photobox</option>
                        <option value="Self Photo">Self Photo</option>
                        <option value="Manual Photobooth">Manual Photobooth</option>
                        <option value="360 Videobooth">360 Videobooth</option>
                    </select>
                </div>
                <div class="input-container checkbox-group">
                    <h3>Pilih Paket Layout:</h3>
                    <div class="checkbox-container" id="checkbox">
                        <input type="checkbox" id="paperframe-4r" name="paket-layout" value="PaperFrame 4R">
                        <label for="paperframe-4r">PaperFrame 4R</label>
                        <br>
                        <input type="checkbox" id="paperframe-2r" name="paket-layout" value="PaperFrame 2R">
                        <label for="paperframe-2r">PaperFrame 2R</label>
                        <br>
                        <input type="checkbox" id="layout-360" name="paket-layout" value="360">
                        <label for="layout-360">360 Videobooth</label>
                    </div>
                </div>
                <div class="input-container" id="quota-2R-dropdown">
                    <label for="quota-2R">Quota PaperFrame 2R:</label>
                    <select name="quota-2R" id="quota-2R">
                        <option value="" disabled selected>Pilih Quota</option>
                        <option value="">200 Pcs</option>
                        <option value="">300 Pcs</option>
                        <option value="">400 Pcs</option>
                        <option value="">600 Pcs</option>
                    </select>
                </div>

                <div class="input-container" id="unlimited-2R-dropdown">
                    <label for="unlimited-2R">Unlimited PaperFrame 2R:</label>
                    <select name="unlimited-2R" id="unlimited-2R">
                        <option value="" disabled selected>Pilih Unlimited</option>
                        <option value="">2 Hour</option>
                        <option value="">3 Hour</option>
                        <option value="">4 Hour</option>
                    </select>
                </div>

                <div class="input-container" id="quota-4R-dropdown">
                    <label for="quota-4R">Quota PaperFrame 4R:</label>
                    <select name="quota-4R" id="quota-4R">
                        <option value="" disabled selected>Pilih Quota</option>
                        <option value="">100 pcs</option>
                        <option value="">150 Pcs</option>
                        <option value="">200 Pcs</option>
                        <option value="">300 Pcs</option>
                    </select>
                </div>

                <div class="input-container" id="unlimited-4R-dropdown">
                    <label for="unlimited-4R">Unlimited PaperFrame 4R:</label>
                    <select name="unlimited-4R" id="unlimited-4R">
                        <option value="" disabled selected>Pilih Unlimited</option>
                        <option value="">2 Hour</option>
                        <option value="">3 Hour</option>
                        <option value="">4 Hour</option>
                    </select>
                </div>

                <div class="input-container" id="unlimited-360-dropdown">
                    <label for="unlimited-360">Unlimited 360 Videobooth:</label>
                    <select name="unlimited-360" id="unlimited-360">
                        <option value="" disabled selected>Pilih Unlimited</option>
                        <option value="">2 Hour</option>
                        <option value="">3 Hour</option>
                        <option value="">4 Hour</option>
                    </select>
                </div>

                <button class="prev-button" id="prev-2">Kembali</button>
                <button class="next-button" id="next-2" disabled>Selanjutnya</button>
            </form>

            <form id="step-3" style="display: none;">
                <h1>Pemesanan Diluar Daerah Jember</h1>
                <div class="input-container">
                    <label for="metode-pembayaran">Payment Method:</label>
                    <select id="payment" name="payment">
                        <option value="" disabled selected>Pilih Metode Pembayaran</option>
                        <option value="cash">Cash</option>
                        <option value="bank">Bank Transfer</option>
                    </select>
                </div>
                <div class="input-container">
                    <label for="proof">Kirim Bukti Pembayaran:</label>
                    <input type="file" id="proof" name="proof" required>
                </div>
                <button class="prev-button" id="prev-3">Kembali</button>
                <button class="submit-button" id="submit" disabled>Pesan</button>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

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
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var paperframe4rCheckbox = document.getElementById("paperframe-4r");
            var paperframe2rCheckbox = document.getElementById("paperframe-2r");
            var layout360Checkbox = document.getElementById("layout-360");

            var quota2RDropdown = document.getElementById("quota-2R-dropdown");
            var unlimited2RDropdown = document.getElementById("unlimited-2R-dropdown");
            var quota4RDropdown = document.getElementById("quota-4R-dropdown");
            var unlimited4RDropdown = document.getElementById("unlimited-4R-dropdown");
            var unlimited360Dropdown = document.getElementById("unlimited-360-dropdown");

            paperframe4rCheckbox.addEventListener("change", updateDropdowns);
            paperframe2rCheckbox.addEventListener("change", updateDropdowns);
            layout360Checkbox.addEventListener("change", updateDropdowns);

            function updateDropdowns() {
                var paperframe4rChecked = paperframe4rCheckbox.checked;
                var paperframe2rChecked = paperframe2rCheckbox.checked;
                var layout360Checked = layout360Checkbox.checked;

                quota2RDropdown.style.display = "none";
                unlimited2RDropdown.style.display = "none";
                quota4RDropdown.style.display = "none";
                unlimited4RDropdown.style.display = "none";
                unlimited360Dropdown.style.display = "none";

                if (paperframe4rChecked || paperframe2rChecked) {
                    if (paperframe4rChecked) {
                        quota4RDropdown.style.display = "block";
                        unlimited4RDropdown.style.display = "block";
                    }
                    if (paperframe2rChecked) {
                        quota2RDropdown.style.display = "block";
                        unlimited2RDropdown.style.display = "block";
                    }
                }
                if (layout360Checked) {
                    unlimited360Dropdown.style.display = "block";
                }
            }

            updateDropdowns();
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

    <script>
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
</body>

</html>