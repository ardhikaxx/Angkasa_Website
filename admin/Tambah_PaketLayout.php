<?php
$koneksi = mysqli_connect("localhost", "root", "", "angkasa");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
if (isset($_POST['tambah'])) {
    $pilihpaketlayout = isset($_POST['paket_layout']) ? $_POST['paket_layout'] : '';
    $namaquota=isset($_POST['txt_nama_quota']) ? $_POST ['txt_nama_quota']:'';
    $hargaquota=isset($_POST['txt_harga_quota']) ? $_POST ['txt_harga_quota']:'';
    $namaunlimited=isset($_POST['txt_nama_unlimited']) ? $_POST ['txt_nama_unlimited']:'';
    $hargaunlimited=isset($_POST['txt_harga_unlimited']) ? $_POST ['txt_harga_unlimited']:'';

    if ($_POST['paket'] == "quota") {
        $query_quota = "INSERT INTO quota (nama_quota, harga_quota, id_layout) VALUES ('$namaquota', '$hargaquota', '$pilihpaketlayout')";
        $stmt_quota = mysqli_prepare($koneksi, $query_quota);
        mysqli_stmt_execute($stmt_quota);
        $result_detail = mysqli_stmt_get_result($stmt_quota);
        header("Location: Paket_layout.php?successMessage=Penmabahan data baru telah berhasil.");
    } else if ($_POST["paket"] == "unlimited") {
        $query_unlimited = "INSERT INTO unlimited (nama_unlimited, harga_unlimited, id_layout) VALUES ('$namaunlimited', '$hargaunlimited', '$pilihpaketlayout')";
        $stmt_unlimited = mysqli_prepare($koneksi, $query_unlimited);
        mysqli_stmt_execute($stmt_unlimited);
        $result_detail = mysqli_stmt_get_result($stmt_unlimited);
        header("Location: Paket_layout.php?successMessage=Penmabahan data baru telah berhasil.");
    }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/png" href="/Angkasa_Website/assets/Logo Web.png">
    <title>Angkasa | Tambah Page</title>
    <style>
        body {
            background-color: #EBECF0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
            font-family: "Poppins", sans-serif;
        }

        .tambah-paket {
            text-align: center;
            width: 300px;
            height: 470px;
            background-color: #EBECF0 0.5;
            backdrop-filter: blur(5px);
            padding: 20px;
            border-radius: 10px;
            box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
            transition: box-shadow 0.3s ease;
        }

        .segment {
            text-align: center;
            max-width: 200px;
            margin: 0 auto;
            padding: 10px 0;
        }

        .segment h1 {
            font-size: 24px;
            margin-bottom: 5px;
            font-weight: 800;
            margin-top: -10px;
        }

        .btn-tambah,
        input {
            border: 0;
            outline: 0;
            font-size: 16px;
            border-radius: 320px;
            padding: 15px;
            background-color: #EBECF0;
            text-shadow: 1px 1px 0 #FFF;
        }

        label {
            display: block;
            margin-bottom: 15px;
            width: 100%;
        }

        input {
            margin-right: 8px;
            box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
            width: 100%;
            box-sizing: border-box;
            transition: all 0.2s ease-in-out;
            appearance: none;
            -webkit-appearance: none;
        }

        .btn-tambah {
            font-weight: bold;
            box-shadow: -5px -5px 20px #FFF, 5px 5px 20px #BABECC;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
            font-weight: 600;
            display: block;
            width: 100%;
            color: #000000;
        }

        .btn-tambah:hover {
            box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
        }

        .btn-tambah:active {
            box-shadow: inset 1px 1px 2px #BABECC, inset -1px -1px 2px #FFF;
        }

        .btn-back {
            font-weight: bold;
            box-shadow: -5px -5px 20px #FFF, 5px 5px 20px #BABECC;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
            font-weight: 600;
            display: block;
            width: 270px;
            margin-top: 25px;
            margin-left: 5px;
            padding: 10px;
            color: #000000;
            border-radius: 50px;
            text-decoration: none;
        }

        .btn-back:hover {
            box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
        }

        .btn-back-icon {
            font-size: 20px;
            margin-right: 5px;
            font-weight: bold;
            color: #000;
        }

        .layout-select {
            width: 100%;
            padding: 15px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #EBECF0;
            text-shadow: 1px 1px 0 #FFF;
            outline: none;
            border-radius: 50px;
            box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
            transition: border-color 0.3s;
            text-align: left;
            color: #61677C;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: transparent;
        }

        .select-wrapper {
            position: relative;
        }

        .select-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #000;
        }

        .input-container.quota-unlimited {
            display: flex;
            margin: 0 auto;
            align-items: center;
        }

        .input-container.quota-unlimited label {
            margin-bottom: 15px;
        }

        .radio-quota-unlimited {
            display: flex;
            align-items: center;
            margin-left: 50px;
            margin-top: -8px;
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

        .nama-quota,
        .harga-quota,
        .nama-unlimited,
        .harga-unlimited {
            display: none;
        }
    </style>
</head>

<body>
    <div class="tambah-paket">
        <form action="Tambah_PaketLayout.php" method="post" class="tambah-container">
            <div class="segment">
                <h1>Tambah <br> Paket Layout</h1>
            </div>
            <label class="pilih-layout">
                <div class="select-wrapper">
                    <select name="paket_layout" class="layout-select">
                        <option value="" disabled selected>Pilih Layout</option>
                        <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM layout");

                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <option value="<?= $data['id_layout'] ?>">
                                    <?= $data['nama_layout'] ?>
                                </option>
                            <?php } ?>
                    </select>
                    <div class="select-icon">
                        <i class="fas fa-caret-down"></i>
                    </div>
                </div>
            </label>
            <label class="quota-unlimited">
                <div class="input-container" id="quota-unlimited">
                    <label>Pilih Paket:</label>
                    <div class="radio-quota-unlimited">
                        <input type="radio" id="quota" name="paket" value="quota" onchange="showQuota()">
                        <label for="quota">Quota</label>
                        <input type="radio" id="unlimited" name="paket" value="unlimited" onchange="showUnlimited()">
                        <label for="unlimited">Unlimited</label>
                    </div>
                </div>
            </label>
            <label class="nama-quota">
                <input type="text" name="txt_nama_quota" autocomplete="off" value="" placeholder="Masukkan Nama Quota">
            </label>

            <label class="harga-quota">
                <input type="text" name="txt_harga_quota" autocomplete="off" value=""
                    placeholder="Masukkan Harga Quota">
            </label>

            <label class="nama-unlimited">
                <input type="text" name="txt_nama_unlimited" autocomplete="off" value=""
                    placeholder="Masukkan Nama Unlimited">
            </label>

            <label class="harga-unlimited">
                <input type="text" name="txt_harga_unlimited" autocomplete="off" value=""
                    placeholder="Masukkan Harga Unlimited">
            </label>

            <button class="btn-tambah" type="submit" name="tambah" value="Tambah">Tambah</button>
            <a class="btn-back" href="Paket_layout.php">
                <span class="btn-back-icon">&#x21A9;</span>
                <span>Kembali</span>
            </a>
        </form>
    </div>

    <script>
        function handleLayoutSelection() {
            var layoutSelect = document.querySelector('.layout-select');

            var selectedLayout = layoutSelect.options[layoutSelect.selectedIndex].value;

            var quotaUnlimited = document.querySelector('.quota-unlimited');

            var namaUnlimited = document.querySelector('.nama-unlimited');

            var hargaUnlimited = document.querySelector('.harga-unlimited');

            if (selectedLayout === '3') {
                quotaUnlimited.style.display = 'none';
                namaUnlimited.style.display = 'block';
                hargaUnlimited.style.display = 'block';
            } else {
                quotaUnlimited.style.display = 'block';
                namaUnlimited.style.display = 'none';
                hargaUnlimited.style.display = 'none';
            }
        }

        document.querySelector('.layout-select').addEventListener('change', handleLayoutSelection);
    </script>

    <script>
        function showQuota() {
            document.querySelector('.nama-quota').style.display = 'block';
            document.querySelector('.harga-quota').style.display = 'block';
            document.querySelector('.nama-unlimited').style.display = 'none';
            document.querySelector('.harga-unlimited').style.display = 'none';
        }

        function showUnlimited() {
            document.querySelector('.nama-quota').style.display = 'none';
            document.querySelector('.harga-quota').style.display = 'none';
            document.querySelector('.nama-unlimited').style.display = 'block';
            document.querySelector('.harga-unlimited').style.display = 'block';
        }
    </script>
</body>

</html>