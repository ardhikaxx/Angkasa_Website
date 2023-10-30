<?php
$koneksi = mysqli_connect("localhost", "root", "", "angkasa");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angkasa | Edit Page</title>
    <style>
        body {
            background-color: #EBECF0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        .edit-box {
            text-align: center;
            width: 300px;
            height: auto;
            background-color: #EBECF0 0.5;
            backdrop-filter: blur(5px);
            padding: 20px;
            border-radius: 10px;
            box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
            transition: box-shadow 0.3s ease;
        }

        .edit-box:hover {
            box-shadow: -5px -5px 20px #FFF, 5px 5px 20px #BABECC;
        }

        .edit-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 16px;
            font-family: "Poppins", sans-serif;
            letter-spacing: -0.2px;
            font-size: 16px;
            text-shadow: 1px 1px 1px #FFF;
        }

        .segment {
            text-align: center;
            max-width: 200px;
            margin: 0 auto;
            padding: 10px 0;
        }

        .segment h1 {
            font-size: 35px;
            margin-bottom: 5px;
            font-weight: 800;
            margin-top: -30px;
        }

        .btn-simpan,
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
            margin-bottom: 24px;
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

        .btn-simpan {
            font-weight: bold;
            box-shadow: -5px -5px 20px #FFF, 5px 5px 20px #BABECC;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
            font-weight: 600;
            display: block;
            width: 100%;
            color: #000000;
        }

        .btn-simpan:hover {
            box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
        }

        .btn-simpan:active {
            box-shadow: inset 1px 1px 2px #BABECC, inset -1px -1px 2px #FFF;
        }

        .btn-back {
            font-weight: bold;
            box-shadow: -5px -5px 20px #FFF, 5px 5px 20px #BABECC;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
            font-weight: 600;
            display: block;
            width: 250px;
            margin-top: 25px;
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
    </style>
</head>

<body>
    <div class="edit-box">
        <form action="edit.php" method="POST" class="edit-container">
            <div class="segment">
                <h1>Edit Page</h1>
                <?php
                if (isset($_POST['simpan'])) {
                    $userMail = $_POST['txt_email'];
                    $userNohp = $_POST['txt_phone'];
                    $userName = $_POST['txt_nama'];

                    $query = "UPDATE user SET nama_lengkap='$userName', email='$userMail',no_hp='$userNohp' WHERE email ='$userMail'";
                    $result = mysqli_query($koneksi, $query);
                    header("Location: settings.php?successMessage=Pembaruan Data Telah Selesai");
                }
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                $query = mysqli_query($koneksi, "SELECT * FROM user where id_user='$id'");
                $data = mysqli_fetch_array($query);
                ?>
            </div>
            <label class="nama-lengkap">
                <input type="hidden" name="txt_id" value="<?php echo $data['id_user']; ?>">
                <input type="text" name="txt_nama" autocomplete="off" value="<?php echo $data['nama_lengkap']; ?>">
            </label>
            <label class="email">
                <input type="email" name="txt_email" autocomplete="off" value="<?php echo $data['email']; ?>">
            </label>
            <label class="nomer-telp">
                <input type="text" name="txt_phone" id="phoneInput" autocomplete="off"
                    value="<?php echo $data['no_hp']; ?>">
            </label>
            <button class="btn-simpan" type="submit" name="simpan" value="Simpan">Simpan</button>
            <a class="btn-back" href="settings.php">
                <span class="btn-back-icon">&#x21A9;</span>
                <span>Back to Settings</span>
            </a>
        </form>
    </div>

    <script>
        const phoneInput = document.getElementById('phoneInput');

        phoneInput.addEventListener('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>

</html>