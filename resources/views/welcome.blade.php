<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Laravel App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #0A2240,rgb(7, 62, 129));
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            width: 100%;
            border-radius: 8px;
            padding: 10px;
            font-size: 18px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h1 class="mb-3">Welcome to Crowd Control App</h1>
                    <p class="mb-4">Your modern proactive public safety system .</p>

                    <a href="{{ route('login') }}" class="btn btn-primary btn-custom mb-2">Login</a>
                    <a href="{{ route('register') }}" class="btn  btn-custom">Register</a>

                    <p class="footer mt-3">&copy; {{ date('Y') }} Crowd Control App. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<!-- btn-outline-light -->