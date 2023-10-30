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
            border-radius: 25px;
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

        .editpass-container .username,
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
            border-radius: 25px;
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

        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 120%;
            transform: rotate(-45deg);
            z-index: -1;
        }

        .star {
            --star-color: #000;
            --star-tail-length: 6em;
            --star-tail-height: 2px;
            --star-width: calc(var(--star-tail-length) / 6);
            --fall-duration: 9s;
            --tail-fade-duration: var(--fall-duration);
            position: absolute;
            top: var(--top-offset);
            left: 0;
            width: var(--star-tail-length);
            height: var(--star-tail-height);
            color: var(--star-color);
            background: linear-gradient(45deg, currentColor, transparent);
            border-radius: 50%;
            filter: drop-shadow(0 0 6px currentColor);
            transform: translate3d(104em, 0, 0);
            animation: fall var(--fall-duration) var(--fall-delay) linear infinite, tail-fade var(--tail-fade-duration) var(--fall-delay) ease-out infinite;
        }

        @media screen and (max-width: 750px) {
            .star {
                animation: fall var(--fall-duration) var(--fall-delay) linear infinite;
            }
        }

        .star:nth-child(1) {
            --star-tail-length: 6.18em;
            --top-offset: 2.77vh;
            --fall-duration: 9.302s;
            --fall-delay: 8.793s;
        }

        .star:nth-child(2) {
            --star-tail-length: 7.17em;
            --top-offset: 66.06vh;
            --fall-duration: 10.241s;
            --fall-delay: 8.654s;
        }

        .star:nth-child(3) {
            --star-tail-length: 7.09em;
            --top-offset: 94.52vh;
            --fall-duration: 11.141s;
            --fall-delay: 9.094s;
        }

        .star:nth-child(4) {
            --star-tail-length: 6.81em;
            --top-offset: 13.13vh;
            --fall-duration: 11.168s;
            --fall-delay: 9.954s;
        }

        .star:nth-child(5) {
            --star-tail-length: 5.1em;
            --top-offset: 45.71vh;
            --fall-duration: 8.984s;
            --fall-delay: 5.795s;
        }

        .star:nth-child(6) {
            --star-tail-length: 7.03em;
            --top-offset: 2.15vh;
            --fall-duration: 8.328s;
            --fall-delay: 2.035s;
        }

        .star:nth-child(7) {
            --star-tail-length: 5.01em;
            --top-offset: 5.34vh;
            --fall-duration: 8.409s;
            --fall-delay: 1.354s;
        }

        .star:nth-child(8) {
            --star-tail-length: 6.52em;
            --top-offset: 60.89vh;
            --fall-duration: 8.17s;
            --fall-delay: 9.254s;
        }

        .star:nth-child(9) {
            --star-tail-length: 6.75em;
            --top-offset: 30.55vh;
            --fall-duration: 11.755s;
            --fall-delay: 5.274s;
        }

        .star:nth-child(10) {
            --star-tail-length: 6.65em;
            --top-offset: 11.37vh;
            --fall-duration: 8.407s;
            --fall-delay: 7.224s;
        }

        .star:nth-child(11) {
            --star-tail-length: 7.22em;
            --top-offset: 39.4vh;
            --fall-duration: 7.04s;
            --fall-delay: 8.536s;
        }

        .star:nth-child(12) {
            --star-tail-length: 7.19em;
            --top-offset: 0vh;
            --fall-duration: 11.238s;
            --fall-delay: 2.007s;
        }

        .star:nth-child(13) {
            --star-tail-length: 6.03em;
            --top-offset: 24.37vh;
            --fall-duration: 8.192s;
            --fall-delay: 0.104s;
        }

        .star:nth-child(14) {
            --star-tail-length: 5.25em;
            --top-offset: 69.2vh;
            --fall-duration: 11.047s;
            --fall-delay: 5.353s;
        }

        .star:nth-child(15) {
            --star-tail-length: 6.62em;
            --top-offset: 16.38vh;
            --fall-duration: 7.422s;
            --fall-delay: 6.189s;
        }

        .star:nth-child(16) {
            --star-tail-length: 6.36em;
            --top-offset: 46.63vh;
            --fall-duration: 10.244s;
            --fall-delay: 9.483s;
        }

        .star:nth-child(17) {
            --star-tail-length: 7.02em;
            --top-offset: 89.97vh;
            --fall-duration: 6.241s;
            --fall-delay: 4.777s;
        }

        .star:nth-child(18) {
            --star-tail-length: 5.04em;
            --top-offset: 70.79vh;
            --fall-duration: 11.501s;
            --fall-delay: 3.856s;
        }

        .star:nth-child(19) {
            --star-tail-length: 5.36em;
            --top-offset: 42.3vh;
            --fall-duration: 9.13s;
            --fall-delay: 5.746s;
        }

        .star:nth-child(20) {
            --star-tail-length: 5.75em;
            --top-offset: 24.85vh;
            --fall-duration: 10.716s;
            --fall-delay: 4.004s;
        }

        .star:nth-child(21) {
            --star-tail-length: 6.08em;
            --top-offset: 47.9vh;
            --fall-duration: 9.323s;
            --fall-delay: 3.768s;
        }

        .star:nth-child(22) {
            --star-tail-length: 5.23em;
            --top-offset: 18.79vh;
            --fall-duration: 7.428s;
            --fall-delay: 6.106s;
        }

        .star:nth-child(23) {
            --star-tail-length: 6.78em;
            --top-offset: 87.94vh;
            --fall-duration: 11.716s;
            --fall-delay: 7.94s;
        }

        .star:nth-child(24) {
            --star-tail-length: 7.41em;
            --top-offset: 23.63vh;
            --fall-duration: 9.369s;
            --fall-delay: 2.997s;
        }

        .star:nth-child(25) {
            --star-tail-length: 5.33em;
            --top-offset: 4.91vh;
            --fall-duration: 7.586s;
            --fall-delay: 3.846s;
        }

        .star:nth-child(26) {
            --star-tail-length: 6.62em;
            --top-offset: 56.35vh;
            --fall-duration: 10.753s;
            --fall-delay: 8.772s;
        }

        .star:nth-child(27) {
            --star-tail-length: 5.64em;
            --top-offset: 98.45vh;
            --fall-duration: 8.921s;
            --fall-delay: 4.529s;
        }

        .star:nth-child(28) {
            --star-tail-length: 6.14em;
            --top-offset: 7.53vh;
            --fall-duration: 6.098s;
            --fall-delay: 9.762s;
        }

        .star:nth-child(29) {
            --star-tail-length: 6.68em;
            --top-offset: 68.67vh;
            --fall-duration: 6.106s;
            --fall-delay: 0.075s;
        }

        .star:nth-child(30) {
            --star-tail-length: 5.66em;
            --top-offset: 80.81vh;
            --fall-duration: 11.828s;
            --fall-delay: 5.747s;
        }

        .star:nth-child(31) {
            --star-tail-length: 5.37em;
            --top-offset: 20.71vh;
            --fall-duration: 7.127s;
            --fall-delay: 8.575s;
        }

        .star:nth-child(32) {
            --star-tail-length: 6.63em;
            --top-offset: 29.95vh;
            --fall-duration: 6.081s;
            --fall-delay: 6.712s;
        }

        .star:nth-child(33) {
            --star-tail-length: 6.16em;
            --top-offset: 11.18vh;
            --fall-duration: 11.6s;
            --fall-delay: 6.256s;
        }

        .star:nth-child(34) {
            --star-tail-length: 7.18em;
            --top-offset: 63.25vh;
            --fall-duration: 9.293s;
            --fall-delay: 6.559s;
        }

        .star:nth-child(35) {
            --star-tail-length: 7.37em;
            --top-offset: 50.14vh;
            --fall-duration: 8.656s;
            --fall-delay: 2.739s;
        }

        .star:nth-child(36) {
            --star-tail-length: 5.31em;
            --top-offset: 84.68vh;
            --fall-duration: 8.981s;
            --fall-delay: 5.089s;
        }

        .star:nth-child(37) {
            --star-tail-length: 6.21em;
            --top-offset: 60.4vh;
            --fall-duration: 11.235s;
            --fall-delay: 2.578s;
        }

        .star:nth-child(38) {
            --star-tail-length: 6.61em;
            --top-offset: 76.81vh;
            --fall-duration: 10.623s;
            --fall-delay: 3.838s;
        }

        .star:nth-child(39) {
            --star-tail-length: 6.81em;
            --top-offset: 10.89vh;
            --fall-duration: 6.439s;
            --fall-delay: 9.852s;
        }

        .star:nth-child(40) {
            --star-tail-length: 6.45em;
            --top-offset: 76.09vh;
            --fall-duration: 11.118s;
            --fall-delay: 9.122s;
        }

        .star:nth-child(41) {
            --star-tail-length: 5.68em;
            --top-offset: 64.01vh;
            --fall-duration: 9.496s;
            --fall-delay: 5.52s;
        }

        .star:nth-child(42) {
            --star-tail-length: 6.13em;
            --top-offset: 39.07vh;
            --fall-duration: 6.992s;
            --fall-delay: 6.959s;
        }

        .star:nth-child(43) {
            --star-tail-length: 5.12em;
            --top-offset: 54.43vh;
            --fall-duration: 8.621s;
            --fall-delay: 2.537s;
        }

        .star:nth-child(44) {
            --star-tail-length: 6.8em;
            --top-offset: 65.23vh;
            --fall-duration: 9.942s;
            --fall-delay: 5.664s;
        }

        .star:nth-child(45) {
            --star-tail-length: 6.17em;
            --top-offset: 78.89vh;
            --fall-duration: 11.613s;
            --fall-delay: 8.372s;
        }

        .star:nth-child(46) {
            --star-tail-length: 5.36em;
            --top-offset: 47.3vh;
            --fall-duration: 7.498s;
            --fall-delay: 6.505s;
        }

        .star:nth-child(47) {
            --star-tail-length: 7.45em;
            --top-offset: 98.2vh;
            --fall-duration: 10.452s;
            --fall-delay: 6.225s;
        }

        .star:nth-child(48) {
            --star-tail-length: 5.04em;
            --top-offset: 67.95vh;
            --fall-duration: 11.582s;
            --fall-delay: 0.193s;
        }

        .star:nth-child(49) {
            --star-tail-length: 7.34em;
            --top-offset: 8.31vh;
            --fall-duration: 6.859s;
            --fall-delay: 9.71s;
        }

        .star:nth-child(50) {
            --star-tail-length: 7.04em;
            --top-offset: 88.31vh;
            --fall-duration: 6.067s;
            --fall-delay: 4.694s;
        }

        .star::before,
        .star::after {
            position: absolute;
            content: "";
            top: 0;
            left: calc(var(--star-width) / -2);
            width: var(--star-width);
            height: 100%;
            background: linear-gradient(45deg, transparent, currentColor, transparent);
            border-radius: inherit;
            animation: blink 2s linear infinite;
        }

        .star::before {
            transform: rotate(45deg);
        }

        .star::after {
            transform: rotate(-45deg);
        }

        @keyframes fall {
            to {
                transform: translate3d(-100em, 0, 0);
            }
        }

        @keyframes tail-fade {

            0%,
            50% {
                width: var(--star-tail-length);
                opacity: 1;
            }

            70%,
            80% {
                width: 0;
                opacity: 0.4;
            }

            100% {
                width: 0;
                opacity: 0;
            }
        }

        @keyframes blink {
            50% {
                opacity: 0.6;
            }
        }
    </style>
</head>

<body>
    <div id="notification-success" style="display: none;">
        <p id="successMessage"></p>
    </div>
    <div class="editpass-container">
        <h1>Edit Password</h1>
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

    <div class="stars">
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
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