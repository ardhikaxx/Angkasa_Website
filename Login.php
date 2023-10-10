<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:500,700&amp;display=swap'><link rel="stylesheet" href="./style.css">
    <title>Angkasa | Login Admin Page</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: row;
            height: 100vh;
        }

        .left-side {
            flex: 1;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: "Montserrat", sans-serif;
        }

        .right-side {
            flex: 1;
            background-color: black;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: "Montserrat", sans-serif;
        }

        .dashboard-button {
            width: 150px;
            height: 20px;
            background-color: white;
            color: black;
            border: 2px solid black;
            transition: background-color 0.3s ease, color 0.3s ease, border 0.3s ease;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 50px;
            padding: 10px 20px;
        }

        .dashboard-button:hover {
            background-color: black;
            color: white;
            border: 2px solid white;
            transition: background-color 0.5s ease, color 0.5s ease, border 0.5s ease;
        }

        .login-box {
            text-align: center;
            padding: 20px;
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #EBECF0;
            border-radius: 10px;
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

        input[type="text"] {
            width: 300px;
            padding: 10px;
            margin: 5px 0;
            margin-left: 10px;
            border: none;
            outline: none;
            background-color: transparent;
        }

        input[type="password"] {
            width: 300px;
            padding: 10px;
            margin: 5px 0;
            border: none;
            outline: none;
            background-color: transparent;
        }

        .username-container {
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

        #username {
            width: 300px;
            padding: 10px;
            margin: 5px 0;
            border: none;
            outline: none;
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
            margin-right: 8px;
            box-shadow: inset 2px 2px 5px #BABECC, inset -5px -5px 10px #FFF;
            width: 100%;
            box-sizing: border-box;
            transition: all 0.2s ease-in-out;
            appearance: none;
            -webkit-appearance: none;
        }

        #password {
            width: 300px;
            padding: 10px;
            margin: 5px 0;
            border: none;
            outline: none;
            background-color: transparent;
        }

        #showPassword {
            cursor: pointer;
            position: relative;
            overflow: hidden;
            z-index: 2;
            margin-left: -60px;
        }

        .right-side p {
            text-align: center;
            text-align: center;
            margin: 10px 20PX;
        }

        .login-box a {
            text-align: left;
            margin-right: 150px;
            margin-top: 5px;
        }

        .forgot-password-link {
            color: #000;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .forgot-password-link:hover {
            text-decoration: underline;
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
            font-weight: 700;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 50px;
            padding: 10px 20px;
        }

        .login-button:hover {
            background-color: #EBECF0;
            color: #000;
            border: 2px solid black;
            transition: background-color 0.5s ease, color 0.5s ease, border 0.5s ease;
        }
    </style>
</head>

<body>
    <div class="left-side">
        <div class="login-box">
            <h1>LOGIN</h1>
            <div class="username-container">
                <input type="text" id="Username" placeholder="Username">
            </div><br>
            <div class="password-container">
                <input type="password" placeholder="Password" id="password">
                <span id="showPassword" onclick="togglePasswordVisibility()">
                    <i id="passwordIcon" class="fas fa-eye"></i>
                </span>
            </div><br><br>
            <a href="#" class="forgot-password-link" id="forgotPasswordLink">Lupa Password?</a><br><br>
            <button class="login-button">Login</button>
        </div>
    </div>
    <div class="right-side">
        <h1>Hallo, Admin!</h1>
        <p>Selamat datang Admin! Kami senang Anda ingin login ke akun Admin Anda.</p>
        <a href="dashboard.php" class="dashboard-button">Dashboard</a>
    </div>

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
</body>

</html>