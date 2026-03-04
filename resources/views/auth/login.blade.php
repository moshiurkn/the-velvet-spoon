<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login – The Velvet Spoon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0f172a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .heading {
            font-family: 'Playfair Display', serif;
        }

        /* Background grid texture */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(220, 38, 38, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(220, 38, 38, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }

        /* Red glow top-left */
        body::after {
            content: '';
            position: fixed;
            top: -150px;
            left: -150px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(220, 38, 38, 0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        .auth-card {
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 10;
        }

        .brand-link {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            background: #dc2626;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 18px;
            color: white;
            box-shadow: 0 0 20px rgba(220, 38, 38, 0.4);
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #f1f5f9;
        }

        .card {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(220, 38, 38, 0.2);
            border-radius: 16px;
            padding: 2.25rem;
            margin-top: 1.5rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.02);
        }

        .form-label {
            display: block;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #94a3b8;
            margin-bottom: 0.4rem;
        }

        .form-input {
            width: 100%;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(100, 116, 139, 0.3);
            color: #e2e8f0;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            font-size: 0.9rem;
            transition: all 0.2s;
            outline: none;
        }

        .form-input::placeholder {
            color: #475569;
        }

        .form-input:focus {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.15);
            background: rgba(15, 23, 42, 0.8);
        }

        .btn-primary {
            width: 100%;
            background: #dc2626;
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.875rem;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: all 0.25s;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
        }

        .btn-primary:hover {
            background: #b91c1c;
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.5rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(100, 116, 139, 0.3);
        }

        .divider span {
            font-size: 0.7rem;
            color: #475569;
            white-space: nowrap;
            letter-spacing: 0.05em;
        }

        .error-box {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 1.25rem;
        }

        .error-box li {
            color: #fca5a5;
            font-size: 0.8rem;
            list-style: disc;
            margin-left: 1rem;
        }

        .success-box {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.3);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 1.25rem;
        }

        .success-box p {
            color: #86efac;
            font-size: 0.8rem;
        }

        a.text-link {
            color: #dc2626;
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.2s;
        }

        a.text-link:hover {
            color: #f87171;
        }
    </style>
</head>

<body>
    <div class="auth-card">
        {{-- Brand Header --}}
        <div style="text-align:center; margin-bottom: 0.25rem;">
            <a href="{{ url('/') }}" class="brand-link" style="justify-content:center;">
                <div class="brand-logo">VS</div>
                <span class="brand-name">The Velvet Spoon</span>
            </a>
            <p style="font-size:0.7rem;letter-spacing:0.2em;text-transform:uppercase;color:#475569;margin-top:0.5rem;">
                Fine Dining Experience</p>
        </div>

        {{-- Card --}}
        <div class="card">
            <h1 class="heading" style="font-size:1.75rem;font-weight:700;color:#f1f5f9;margin-bottom:0.2rem;">Welcome
                Back</h1>
            <p style="font-size:0.82rem;color:#64748b;margin-bottom:1.5rem;">Sign in to continue your dining experience
            </p>

            @if ($errors->any())
            <ul class="error-box">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
            @endif
            @if (session('status'))
            <div class="success-box">
                <p>{{ session('status') }}</p>
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div style="margin-bottom:1.1rem;">
                    <label class="form-label" for="email">Email Address</label>
                    <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required
                        autofocus placeholder="rahim@example.com">
                </div>

                <div style="margin-bottom:1rem;">
                    <label class="form-label" for="password">Password</label>
                    <input id="password" class="form-input" type="password" name="password" required
                        placeholder="••••••••">
                </div>

                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;">
                    <label style="display:flex;align-items:center;gap:0.5rem;cursor:pointer;">
                        <input type="checkbox" name="remember" id="remember_me"
                            style="accent-color:#dc2626;width:14px;height:14px;">
                        <span style="font-size:0.8rem;color:#64748b;">Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-link" style="font-size:0.8rem;">Forgot
                        password?</a>
                    @endif
                </div>

                <button type="submit" class="btn-primary">Sign In</button>

                <div class="divider"><span>New to The Velvet Spoon?</span></div>

                <div style="text-align:center;">
                    <a href="{{ route('register') }}" class="text-link">Create an Account →</a>
                </div>
            </form>
        </div>

        <p style="text-align:center;font-size:0.7rem;color:#1e293b;margin-top:1.25rem;">&copy; {{ date('Y') }} The
            Velvet Spoon. All rights reserved.</p>
    </div>
</body>

</html>