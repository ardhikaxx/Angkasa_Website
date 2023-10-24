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


        button,
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
            color: #61677C;
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
    </style>
</head>
<body>
<div class="edit-box">
        <form action="edit.php" method="POST" class="edit-container">
            <div class="segment">
                <h1>Edit Page</h1>
            </div>
            <label class="nama-lengkap">
                <input type="text" placeholder="Masukkan Nama Lengkap" name="txt_nama" autocomplete="off">
            </label>
            <label class="email">
                <input type="email" placeholder="Masukkan email" name="txt_email" autocomplete="off">
            </label>
            <label class="nomer-telp">
                <input type="text" placeholder="Masukan Nomor telepon" name="txt_phone" id="phoneInput" autocomplete="off">
            </label>
            <button class="btn-simpan" type="submit" name="simpan" value="Simpan">Simpan</button>
        </form>
    </div>
</body>
</html>