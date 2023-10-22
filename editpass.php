<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Angkasa | Edit Pass Page</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .editpass-container {
            width: 100%;
            max-width: 400px;
            padding: 25px;
            background-color: #EBECF0;
            backdrop-filter: blur(5px);
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.2s;
            justify-content: center;
            align-items: center;
        }

        .editpass-container h1 {
            color: #000;
            font-weight: 800;
            font-size: 24px;
            margin-top: -5px;
        }

        .editpass-container .email,
        .editpass-container .password,
        .editpass-container .repeat-password {
            margin-bottom: 15px;
            width: 350px;
            margin-left: 25px;
        }

        label {
            display: block;
            margin-bottom: 24px;
            width: 100%;
        }

        input {
            border: 0;
            outline: 0;
            font-size: 16px;
            border-radius: 320px;
            padding: 15px;
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

        .editpass-container {
            width: 100%;
            max-width: 400px;
            padding: 25px;
            background-color: #EBECF0;
            backdrop-filter: blur(5px);
            border-radius: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.2s;
            justify-content: center;
            align-items: center;
        }

        .editpass-container .email,
        .editpass-container .password,
        .editpass-container .repeat-password {
            margin-bottom: 15px;
            position: relative;
        }

        .editpass-container .password input,
        .editpass-container .repeat-password input {
            margin-right: 0;
        }

        .editpass-container .password span,
        .editpass-container .repeat-password span {
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .editpass-container .email span i,
        .editpass-container .repeat-password span i {
            z-index: 2;
        }

        .editpass-container button {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 15px 20px;
            border-radius: 320px;
            width: 350px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .editpass-container button:hover {
            background-color: #333;
        }

        .editpass-container button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .editpass-container button:not(:disabled) {
            background-color: #000;
            cursor: pointer;
        }

        .editpass-container button:hover:not(:disabled) {
            background-color: #333;
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
            border-radius: 15px;
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
    <div class="editpass-container">
        <h1>Edit Password Baru</h1>
        <form method="post" action="update_password.php">
            <label class="email">
                <input type="text" id="email" placeholder="Masukkan Email Anda" name="email" required>
            </label>
            <label class="password">
                <input type="password" id="newPassword" placeholder="Masukkan Password Baru" name="new_password" required>
                <span id="showPassword1" onclick="togglePasswordVisibility('newPassword', 'passwordIcon1')">
                    <i id="passwordIcon1" class="fas fa-eye"></i>
                </span>
            </label>
            <label class="repeat-password">
                <input type="password" id="confirmPassword" placeholder="Ulangi Password Baru" name="confirm_password" required>
                <span id="showPassword2" onclick="togglePasswordVisibility('confirmPassword', 'passwordIcon2')">
                    <i id="passwordIcon2" class="fas fa-eye"></i>
                </span>
            </label>
            <button type="submit" id="submitButton" disabled>Simpan</button>
        </form>
    </div>

    <script>
        const emailInput = document.getElementById('email');
        const newPasswordInput = document.getElementById('newPassword');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const passwordIcon1 = document.getElementById('passwordIcon1');
        const passwordIcon2 = document.getElementById('passwordIcon2');
        const submitButton = document.getElementById('submitButton');

        function togglePasswordVisibility(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        function checkInputs() {
            if (emailInput.value !== '' && newPasswordInput.value !== '' && confirmPasswordInput.value !== '') {
                submitButton.removeAttribute('disabled');
            } else {
                submitButton.setAttribute('disabled', 'disabled');
            }
        }

        emailInput.addEventListener('input', checkInputs);
        newPasswordInput.addEventListener('input', checkInputs);
        confirmPasswordInput.addEventListener('input', checkInputs);
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