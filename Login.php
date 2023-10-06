<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            font-family: "Poppins", sans-serif;
        }

        .right-side {
            flex: 1;
            background-color: black;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: "Poppins", sans-serif;
        }

        .dashboard-button {
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
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease;
        }

        .login-box:hover {
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
        }

        .left-side h1,
        .right-side h1 {
            margin-top: 0;
            font-weight: 750;
        }

        input[type="text"] {
            width: 300px;
            padding: 5px;
            margin: 5px 0;
            margin-left: 10px;
            border: none;
            outline: none;
            background-color: transparent;
        }

        input[type="password"] {
            width: 300px;
            padding: 5px;
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
        }

        #username {
            width: 300px;
            padding: 5px;

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
        }

        #password {
            width: 300px;
            padding: 5px;
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
            margin-left: -50px;
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
            background-color: black;
            color: white;
            border: 2px solid black;
            transition: background-color 0.5s ease, color 0.5s ease, border 0.5s ease;
            font-weight: 800;
            font-size: 15px;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            width: 300px;
        }

        .login-button:hover {
            background-color: white;
            color: black;
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