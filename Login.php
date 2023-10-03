<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: row;
            height: 100vh;
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
            backdrop-filter: blur(10px);
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

        .navbar-menu li a {
            color: #000;
            text-decoration: none;
        }

        .navbar-menu li a:hover {
            text-decoration: underline;
        }

        .admin-link {
            color: #000;
            font-family: "Poppins", sans-serif;
            text-decoration: none;
            font-weight: bolder;
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

        .login-box {
            text-align: center;
            padding: 20px;
        }

        .left-side h1,
        .right-side h1 {
            margin-top: 0;
            font-weight: 800;
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

        .login-button {
            background-color: black;
            font-weight: 800;
            font-size: 15px;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            cursor: pointer;
            width: 300px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a class="navbar-logo" href="#"><img src="assets/Logo Angkasa Photobooth.png" alt="Logo"></a>
        <ul class="navbar-menu">
            <li><a href="Dashboard.php">Home</a></li>
            <li><a href="Pemesanan.php">Pemesanan</a></li>
            <li><a href="Ourpackage.php">Our Package</a></li>
            <li><a href="Gallery.php">Gallery</a></li>
            <li><a href="Tentang.php">Tentang Kami</a></li>
        </ul>
        <a class="admin-link" href="Login.php">Anda Admin?</a>
    </div>

    <div class="left-side">
        <div class="login-box">
            <h1>LOGIN</h1>
            <div class="username-container">
                <input type="text" id="Username" placeholder="Username">
            </div><br>
            <div class="password-container">
                <input type="password" placeholder="Password" id="password">
                <span id="showPassword" onclick="togglePasswordVisibility()">&#128065;</span>
            </div><br><br>
            <a href="#">Lupa Password?</a><br><br>
            <button class="login-button">Login</button>
        </div>
    </div>
    <div class="right-side">
        <h1>Hallo, Admin!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</p>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const showPasswordIcon = document.getElementById("showPassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordIcon.innerHTML = "&#128064;";
            } else {
                passwordInput.type = "password";
                showPasswordIcon.innerHTML = "&#128065;";
            }
        }
    </script>
</body>

</html>