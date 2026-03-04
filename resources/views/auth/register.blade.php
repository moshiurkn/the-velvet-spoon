<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register – The Velvet Spoon</title>
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
            padding: 1.5rem 1rem;
        }

        .heading {
            font-family: 'Playfair Display', serif;
        }

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

        body::after {
            content: '';
            position: fixed;
            bottom: -150px;
            right: -150px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(220, 38, 38, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .auth-card {
            width: 100%;
            max-width: 520px;
            position: relative;
            z-index: 10;
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

        .two-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media(max-width: 480px) {
            .two-col {
                grid-template-columns: 1fr;
            }
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
        <div style="text-align:center;margin-bottom:0.25rem;">
            <a href="{{ url('/') }}"
                style="text-decoration:none;display:inline-flex;align-items:center;gap:12px;justify-content:center;">
                <div class="brand-logo">VS</div>
                <span class="brand-name">The Velvet Spoon</span>
            </a>
            <p style="font-size:0.7rem;letter-spacing:0.2em;text-transform:uppercase;color:#475569;margin-top:0.5rem;">
                Fine Dining Experience</p>
        </div>

        <div class="card">
            <h1 class="heading" style="font-size:1.75rem;font-weight:700;color:#f1f5f9;margin-bottom:0.2rem;">Create
                Account</h1>
            <p style="font-size:0.82rem;color:#64748b;margin-bottom:1.5rem;">Join us to reserve tables and explore our
                menu</p>

            @if ($errors->any())
            <ul class="error-box">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="two-col" style="margin-bottom:1.1rem;">
                    <div>
                        <label class="form-label" for="name">Full Name</label>
                        <input id="name" class="form-input" type="text" name="name" value="{{ old('name') }}" required
                            autofocus placeholder="যেমন: রহিম উদ্দিন">
                    </div>
                    <div>
                        <label class="form-label" for="phone">Phone Number</label>
                        <input id="phone" class="form-input" type="text" name="phone" value="{{ old('phone') }}"
                            required placeholder="01711-234567">
                    </div>
                </div>

                <div style="margin-bottom:1.1rem;">
                    <label class="form-label" for="email">Email Address</label>
                    <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required
                        placeholder="rahim@example.com">
                </div>

                <div style="margin-bottom:1.1rem;">
                    <label class="form-label" for="address">Address</label>
                    <input id="address" class="form-input" type="text" name="address" value="{{ old('address') }}"
                        required placeholder="ধানমণ্ডি, ঢাকা-১২০৯">
                </div>

                <div class="two-col" style="margin-bottom:1.5rem;">
                    <div>
                        <label class="form-label" for="password">Password</label>
                        <input id="password" class="form-input" type="password" name="password" required
                            placeholder="কমপক্ষে ৮ অক্ষর" autocomplete="new-password">
                    </div>
                    <div>
                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" class="form-input" type="password"
                            name="password_confirmation" required placeholder="পুনরায় পাসওয়ার্ড"
                            autocomplete="new-password">
                    </div>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div style="margin-bottom:1.25rem;">
                    <label style="display:flex;align-items:flex-start;gap:0.75rem;cursor:pointer;">
                        <input type="checkbox" name="terms" id="terms" required
                            style="accent-color:#dc2626;width:14px;height:14px;margin-top:2px;flex-shrink:0;">
                        <span style="font-size:0.78rem;color:#64748b;line-height:1.5;">
                            I agree to the <a href="{{ route('terms.show') }}" target="_blank" class="text-link">Terms
                                of Service</a> and <a href="{{ route('policy.show') }}" target="_blank"
                                class="text-link">Privacy Policy</a>
                        </span>
                    </label>
                </div>
                @endif

                <button type="submit" class="btn-primary">Create Account</button>

                <div class="divider"><span>Already a member?</span></div>
                <div style="text-align:center;">
                    <a href="{{ route('login') }}" class="text-link">Sign In to Your Account →</a>
                </div>
            </form>
        </div>

        <p style="text-align:center;font-size:0.7rem;color:#1e293b;margin-top:1.25rem;">&copy; {{ date('Y') }} The
            Velvet Spoon. All rights reserved.</p>
    </div>
</body>

</html>