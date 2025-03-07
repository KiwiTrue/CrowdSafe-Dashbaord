<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CrowdSafe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #0A2240; /* Dark blue background */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            display: flex;
            width: 60%;
            max-width: 900px;
            background: white;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .logo-section {
            background-color: #0A2240;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #D4AF37; /* Gold color */
            padding: 40px;
        }
        .logo-section img {
            width: 120px;
            margin-bottom: 15px;
        }
        .logo-section h2 {
            font-weight: bold;
            font-size: 32px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
        .login-form {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-form h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-control {
            border: none;
            border-bottom: 2px solid #ccc;
            border-radius: 0;
            padding: 10px;
            background: transparent;
            box-shadow: none;
        }
        .form-control:focus {
            border-color: #D4AF37;
            box-shadow: none;
        }
        .btn-login {
            background-color: #D4AF37;
            border: none;
            color: white;
            font-weight: bold;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-login:hover {
            background-color: #b8962e;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Left Side - Logo Section -->
        <div class="logo-section">
            <img src="{{ asset('images/logo.png') }}" alt="CrowdSafe Logo"> <!-- Replace with actual logo path -->
            <h2>CrowdSafe</h2>
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-form">
            <h3>Sign-in</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-login">Login</button>
            </form>
        </div>
    </div>

</body>
</html>
