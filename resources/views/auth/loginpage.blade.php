<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .popup {
            display: block;
            position: fixed;
            z-index: 9999;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #d4edda;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: popupIn 0.5s ease forwards;
        }

        @keyframes popupIn {
            from {
                transform: translate(-50%, -60%);
                opacity: 0;
            }

            to {
                transform: translate(-50%, -50%);
                opacity: 1;
            }
        }

        .checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: inline-block;
            border: 4px solid #28a745;
            position: relative;
            animation: pop 0.5s ease-out forwards;
        }

        .checkmark:after {
            content: '';
            position: absolute;
            left: 22px;
            top: 14px;
            width: 25px;
            height: 50px;
            border-right: 4px solid #28a745;
            border-bottom: 4px solid #28a745;
            transform: rotate(45deg);
            animation: draw 0.5s 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes draw {
            to {
                opacity: 1;
            }
        }

        @keyframes pop {
            0% {
                transform: scale(0.5);
                opacity: 0.5;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

    <div class="card shadow p-4" style="width: 400px">
        <h4 class="text-center mb-4">Login</h4>

        {{-- ALERT GAGAL --}}
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        {{-- ALERT TIDAK AKTIF --}}
        @if (session('inactive'))
            <div class="alert alert-warning">{{ session('inactive') }}</div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Login</button>
        </form>
    </div>

    {{-- POPUP BERHASIL --}}
    @if (session('success') === 'login')
        <div class="popup" id="login-popup">
            <div class="checkmark"></div>
            <h4 class="mt-3">Anda telah berhasil untuk melakukan login</h4>
        </div>

        <script>
            setTimeout(() => {
                document.getElementById('login-popup').style.display = 'none';
            }, 3000);
        </script>
    @endif

</body>

</html>