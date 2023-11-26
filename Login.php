<?php
require('koneksi.php');
$error = "";
$max_attempts = 5;
session_start();
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $password = $_POST['txt_pass'];

    if (!empty(trim($email)) && !empty(trim($password))) {
        $koneksi = mysqli_connect("localhost", "root", "", "angkasa");

        $query = "SELECT * FROM user WHERE email = ? AND password = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $userRow = mysqli_fetch_assoc($result);
            $jabatan = $userRow['jabatan'];

            if ($jabatan === 'Admin') {
                $_SESSION['user'] = $userRow['nama_lengkap'];
                $_SESSION['login_attempts'] = 0; 
                $redirectMessage = 'Login berhasil! Selamat datang, ' . urlencode($userRow['nama_lengkap']) . '!';
                header("Location: ./admin/dashboard-admin.php?successMessage=" . $redirectMessage);
            } else {
                $error = '("Karyawan tidak memiliki akses masuk")';
            }
        } else {
            $_SESSION['login_attempts']++;

            if ($_SESSION['login_attempts'] >= $max_attempts) {
                header("Location: lupapass.php");
                exit();
            }

            $error = '("email atau password salah.");';
        }

        mysqli_stmt_close($stmt);
        mysqli_close($koneksi);
    } else {
        $error = '("Silahkan input email dan password.");';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:500,700&amp;display=swap'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/Logo Web.png">
    <link rel="stylesheet" href="./style.css">
    <title>Angkasa | Login Admin Page</title>
    <style>
        body {
            background-color: #EBECF0;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: row;
            height: 100vh;
        }

        .left-side {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: "Montserrat", sans-serif;
        }

        .right-side {
            flex: 1;
            background-color: black;
            color: #EBECF0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: "Montserrat", sans-serif;
        }

        .dashboard-button {
            width: 200px;
            height: 20px;
            background-color: #EBECF0;
            color: black;
            border: 2px solid black;
            transition: background-color 0.3s ease, color 0.3s ease, border 0.3s ease;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 50px;
            padding: 15px 25px;
        }

        .dashboard-button:hover {
            background-color: black;
            color: #EBECF0;
            border: 2px solid #EBECF0;
            transition: background-color 0.5s ease, color 0.5s ease, border 0.5s ease;
        }

        .login-box {
            text-align: center;
            padding: 20px;
            max-width: 300px;
            margin: 0 auto;
            border-radius: 15px;
            background-color: #EBECF0 0.5;
            backdrop-filter: blur(5px);
            box-shadow: -2px -2px 5px #FFF, 2px 2px 5px #BABECC;
            transition: box-shadow 0.3s ease;
        }

        .login-box:hover {
            box-shadow: -5px -5px 20px #FFF, 5px 5px 20px #BABECC;
        }

        .left-side h1,
        .right-side h1 {
            margin-top: 0;
            font-weight: 750;
        }

        .right-side p {
            padding-left: 100px;
            padding-right: 100px;
        }


        input[type="text"] {
            width: 100%;
            padding: 15px;
            border: none;
            outline: none;
            background-color: transparent;
            box-shadow: inset 2px 2px 10px #BABECC, inset -5px -5px 10px #FFF;
            box-sizing: border-box;
            transition: all 0.2s ease-in-out;
            appearance: none;
            -webkit-appearance: none;
            border-radius: 50px;
        }

        input[type="password"] {
            width: 100%;
            padding: 15px;
            border: none;
            outline: none;
            background-color: transparent;
            box-shadow: inset 2px 2px 10px #BABECC, inset -5px -5px 10px #FFF;
            box-sizing: border-box;
            transition: all 0.2s ease-in-out;
            appearance: none;
            -webkit-appearance: none;
            border-radius: 50px;
        }

        .email-container {
            max-width: 300px;
            border-radius: 50px;
            border: none;
            outline: none;
            background-color: rgba(0, 0, 0, 0.15);
            background-color: #EBECF0;
            text-shadow: 1px 1px 0 #FFF;
            margin-right: 8px;
            box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
            width: 100%;
            box-sizing: border-box;
            transition: all 0.2s ease-in-out;
            appearance: none;
            -webkit-appearance: none;
        }

        #email {
            width: 300px;
            padding: 15px;
            margin: 0;
            border: none;
            outline: none;
            padding-left: 20px;
            background-color: transparent;
        }

        .password-container {
            max-width: 300px;
            border-radius: 50px;
            border: none;
            outline: none;
            background-color: rgba(0, 0, 0, 0.15);
            background-color: #EBECF0;
            text-shadow: 1px 1px 0 #FFF;
            box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
            width: 100%;
            box-sizing: border-box;
            transition: all 0.2s ease-in-out;
            appearance: none;
            -webkit-appearance: none;
            margin-bottom: -20px;
        }

        #password {
            width: 300px;
            padding: 15px;
            margin: 0;
            border: none;
            outline: none;
            background-color: transparent;
        }

        #showPassword {
            width: 300px;
            padding: 15px;
            margin: 2px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            z-index: 2;
            margin-left: -57px;
        }

        .right-side p {
            text-align: center;
            text-align: center;
            margin: 10px 20px;
            color: #EBECF0;
            margin-top: -10px;
            margin-bottom: 25px;
        }

        .login-box a {
            text-align: left;
            margin-right: 150px;
            margin-top: 5px;
        }

        .forgot-password-link {
            color: #898989;
            text-decoration: none;
            position: relative;
            transition: color 0.3s ease, transform 0.3s ease;
            font-weight: bold;
            cursor: pointer;
            margin-top: 30px;
        }

        .forgot-password-link::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #000;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease;
        }

        .forgot-password-link:hover {
            color: #000;
        }

        .forgot-password-link:hover::before {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .login-button {
            width: 300px;
            height: 50px;
            border: 0;
            outline: 0;
            background-color: #000;
            color: #EBECF0;
            border: 2px solid black;
            transition: background-color 0.3s ease, color 0.3s ease, border 0.3s ease;
            font-weight: 750;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 50px;
            padding: 15px;
            margin-top: -5px;
        }

        .login-button:hover {
            background-color: #EBECF0;
            color: #000;
            border: 2px solid black;
            transition: background-color 0.5s ease, color 0.5s ease, border 0.5s ease;
        }

        .notification {
            display: none;
            position: fixed;
            top: 10%;
            left: 25%;
            transform: translate(-50%, -50%) scale(0.2);
            background: #000;
            color: #fff;
            font-family: "Poppins", sans-serif;
            text-align: center;
            padding: 15px 20px;
            border-radius: 50px;
            opacity: 0;
            z-index: 999;
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

        #notification-success {
            position: fixed;
            font-family: "Poppins", sans-serif;
            font-size: 18px;
            top: 20px;
            left: 50%;
            transform: translate(-50%, 10%);
            background-color: #4CAF50;
            color: #fff;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        #notification-success.show {
            opacity: 1;
        }
    </style>
</head>

<body>
    <div id="notification-success" style="display: none;">
        <p id="successMessage"></p>
    </div>

    <div id="notification" class="notification">
        <span id="notification-content"></span>
    </div>

    <div class="left-side">
        <div class="login-box">
            <h1>LOGIN</h1>
            <form action="Login.php" method="POST">
                <div class="email-container">
                    <input type="text" id="email" name="txt_email" placeholder="Email" autocomplete="on">
                </div><br>
                <div class="password-container">
                    <input type="password" name="txt_pass" placeholder="Password" id="password">
                    <span id="showPassword" onclick="togglePasswordVisibility()">
                        <i id="passwordIcon" class="fas fa-eye"></i>
                    </span>
                </div><br><br>
                <a href="lupapass.php" class="forgot-password-link" id="forgotPasswordLink">Lupa Password?</a><br><br>
                <button type="submit" name="submit" class="login-button">Login</button>
            </form>
        </div>
    </div>
    <div class="right-side">
        <h1 data-aos="fade-down" data-aos-easing="ease" data-aos-duration="700">Hallo, Admin!</h1>
        <p data-aos="fade-down" data-aos-easing="ease" data-aos-duration="500">Selamat datang kembali ke pusat kendali Angkasa Photobooth</p>
        <a href="dashboard.php" class="dashboard-button" data-aos="fade-down" data-aos-easing="ease"
            data-aos-duration="300">Dashboard</a>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

    <script>
        const emailInput = document.getElementById('email');
        const autocompleteList = document.getElementById('autocomplete-list');

        emailInput.addEventListener('input', function () {
            autocompleteList.style.width = emailInput.offsetWidth + 'px';
        });
    </script>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const showPasswordIcon = document.getElementById("passwordIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordIcon.classList.remove("fa-eye");
                showPasswordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                showPasswordIcon.classList.remove("fa-eye-slash");
                showPasswordIcon.classList.add("fa-eye");
            }
        }
    </script>

    <script>
        function showNotification(message) {
            var notification = document.getElementById('notification');
            var notificationContent = document.getElementById('notification-content');

            notificationContent.innerHTML = message;
            notification.style.display = 'block';

            setTimeout(function () {
                closeNotification();
            }, 3000);
        }

        function closeNotification() {
            var notification = document.getElementById('notification');

            notification.style.animation = 'notificationFadeOut 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards';

            setTimeout(function () {
                notification.style.display = 'none';
                notification.style.animation = '';
            }, 500);
        }

        <?php
        if (!empty($error)) {
            echo 'showNotification' . $error;
        }
        ?>
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const successMessage = urlParams.get('successMessage');

            if (successMessage) {
                const notification = document.getElementById('notification-success');
                const successMessageElement = document.getElementById('successMessage');
                successMessageElement.innerText = successMessage;

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
</body>

</html>