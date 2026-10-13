<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Raffa Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --dark-bg: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at top right, #1e1b4b, #0f172a, #020617);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f8fafc;
            padding: 20px;
            margin: 0;
            overflow-x: hidden;
        }

        .login-card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 40px;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .brand-logo {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 28px;
            font-weight: 800;
            color: #fff;
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.4);
        }

        .form-control {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff;
            border-radius: 12px;
            padding: 12px 16px 12px 42px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(15, 23, 42, 0.8);
            border-color: var(--primary);
            color: #fff;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2);
        }

        .form-control::placeholder {
            color: #64748b;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group-custom i.input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            z-index: 10;
            font-size: 16px;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: 0;
            color: #cbd5e1;
            cursor: pointer;
            z-index: 10;
            min-height: 44px;
            min-width: 44px;
        }

        .toggle-password:focus-visible {
            outline: 2px solid #c4b5fd;
            outline-offset: 2px;
            border-radius: 8px;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px;
            border-radius: 12px;
            width: 100%;
            font-size: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(99, 102, 241, 0.4);
            color: white;
        }

        .alert-custom {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
            border-radius: 12px;
            font-size: 13px;
            padding: 12px 16px;
            margin-bottom: 20px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="login-card text-center">
        <div class="brand-logo">
            <i class="fas fa-user-shield"></i>
        </div>

        <h3 class="fw-bold mb-1">Admin Portal</h3>
        <p class="text-secondary small mb-4">Masuk untuk mengelola portfolio Raffa</p>

        @if(session('success'))
            <div class="alert alert-success bg-success bg-opacity-20 text-success border-0 rounded-3 text-start small mb-4">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-custom text-start">
                <i class="fas fa-exclamation-triangle me-2"></i>
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="input-group-custom text-start">
                <i class="fas fa-user input-icon"></i>
                <label class="visually-hidden" for="email">Email admin</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email Admin" value="{{ old('email') }}" autocomplete="username" required autofocus>
            </div>

            <div class="input-group-custom text-start">
                <i class="fas fa-lock input-icon"></i>
                <label class="visually-hidden" for="passwordInput">Password</label>
                <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Password Admin" autocomplete="current-password" required>
                <button type="button" class="toggle-password" aria-label="Tampilkan password" aria-pressed="false" onclick="togglePasswordVisibility(this)">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                </button>
            </div>

            <button type="submit" class="btn-primary-custom mt-2 mb-3">
                <i class="fas fa-sign-in-alt me-2"></i> Masuk Dashboard
            </button>
        </form>

        <div class="mt-3">
            <a href="{{ route('portfolio.index') }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Kembali ke Portfolio
            </a>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(button) {
            const pwd = document.getElementById('passwordInput');
            const icon = button.querySelector('i');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
                button.setAttribute('aria-label', 'Sembunyikan password');
                button.setAttribute('aria-pressed', 'true');
            } else {
                pwd.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
                button.setAttribute('aria-label', 'Tampilkan password');
                button.setAttribute('aria-pressed', 'false');
            }
        }
    </script>
</body>
</html>
