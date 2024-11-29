<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Chill Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url(https://images.pexels.com/photos/683039/pexels-photo-683039.jpeg?cs=srgb&dl=pexels-apgpotr-683039.jpg&fm=jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-coffee {
            background-color: #6f4f37;
            color: white;
        }

    </style>
</head>

<body>

    <div class="register-container">
        <h2 class="text-center mb-4">Create an Account</h2>
        <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="address" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="phonenumber" class="form-label">Phonenumber</label>
                <input type="phonenumber" class="form-control" id="phonenumber" name="phonenumber" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" required>
                        <button type="button" class="btn btn-outline-dark" onclick="togglePasswordVisibility('#password', 'eye-icon1', 'eye-slash-icon1')" style="height: 3rem; width: 70px;">
                            <i id="eye-icon1" class="bi bi-eye"></i>
                            <i id="eye-slash-icon1" class="bi bi-eye-slash" style="display: none;"></i>
                        </button>
                </div>
            </div>
            <div class="mb-3">
                <label for="confirmpassword" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
                        <button type="button" class="btn btn-outline-dark" onclick="togglePasswordVisibility('#confirmpassword', 'eye-icon2', 'eye-slash-icon2')" style="height: 3rem; width: 70px;">
                            <i id="eye-icon2" class="bi bi-eye"></i>
                            <i id="eye-slash-icon2" class="bi bi-eye-slash" style="display: none;"></i>
                        </button>
                </div>
            </div>
            @foreach ($errors->all() as $error)
                <div class="text-danger" style="margin-bottom: 10px;">{{ $error }}</div>
            @endforeach
            <button type="submit" class="btn btn-coffee w-100">Register</button>
        </form>
        <div class="text-center mt-3">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <script>
        function togglePasswordVisibility(inputId, eyeIconId, eyeSlashIconId) {
            var passwordInput = document.querySelector(inputId);
            var eyeIcon = document.getElementById(eyeIconId);
            var eyeSlashIcon = document.getElementById(eyeSlashIconId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.style.display = 'none';
                eyeSlashIcon.style.display = 'inline';
            } else {
                passwordInput.type = "password";
                eyeIcon.style.display = 'inline';
                eyeSlashIcon.style.display = 'none';
            }
        }
    </script>
</body>

</html>