<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile – The Velvet Spoon</title>
    @include('home.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
        }

        .page-banner {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            padding: 7rem 0 2rem;
            position: relative;
            overflow: hidden;
        }

        .page-banner::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: linear-gradient(rgba(220, 38, 38, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(220, 38, 38, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Avatar */
        .avatar-ring {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #dc2626;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: white;
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.2), 0 0 20px rgba(220, 38, 38, 0.3);
            flex-shrink: 0;
        }

        /* Tabs */
        .tab-nav {
            display: flex;
            gap: 0;
            border-bottom: 2px solid #e2e8f0;
            margin-bottom: 1.5rem;
        }

        .tab-btn {
            padding: 0.75rem 1.5rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: #64748b;
            background: none;
            border: none;
            border-bottom: 2px solid transparent;
            margin-bottom: -2px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .tab-btn:hover {
            color: #dc2626;
        }

        .tab-btn.active {
            color: #dc2626;
            border-bottom-color: #dc2626;
        }

        .tab-panel {
            display: none;
        }

        .tab-panel.active {
            display: block;
        }

        /* Cards */
        .info-card {
            background: white;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .info-row {
            display: flex;
            align-items: center;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #94a3b8;
            width: 110px;
            flex-shrink: 0;
        }

        .info-value {
            font-size: 0.9rem;
            color: #1e293b;
            font-weight: 500;
        }

        /* Order pills */
        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .s-progress {
            background: #fef3c7;
            color: #92400e;
            border: 1px solid #fcd34d;
        }

        .s-onway {
            background: #e0e7ff;
            color: #3730a3;
            border: 1px solid #a5b4fc;
        }

        .s-delivered {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
        }

        .s-canceled {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        /* Booking status */
        .b-pending {
            background: #fef9c3;
            color: #854d0e;
            border: 1px solid #fde047;
        }

        .b-confirmed {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
        }

        .b-canceled {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f8fafc;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-img {
            width: 56px;
            height: 56px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #f1f5f9;
            flex-shrink: 0;
        }

        .booking-item {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr auto;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f8fafc;
        }

        .booking-item:last-child {
            border-bottom: none;
        }

        @media(max-width: 640px) {
            .booking-item {
                grid-template-columns: 1fr 1fr;
            }
        }

        .empty-msg {
            text-align: center;
            padding: 3rem 1rem;
            color: #94a3b8;
        }

        .empty-msg i {
            font-size: 2.5rem;
            display: block;
            margin-bottom: 0.75rem;
        }

        .edit-btn {
            background: #dc2626;
            color: white;
            padding: 0.6rem 1.25rem;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.82rem;
            font-weight: 600;
            transition: background 0.2s;
        }

        .edit-btn:hover {
            background: #b91c1c;
            color: white;
            text-decoration: none;
        }

        .success-banner {
            background: #dcfce7;
            border: 1px solid #86efac;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            color: #166534;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
</head>

<body>
    @include('home.navbar')

    {{-- Page Banner --}}
    <div class="page-banner">
        <div style="max-width:1000px;margin:0 auto;padding:0 1.5rem;position:relative;z-index:1;">
            <div style="display:flex;align-items:center;gap:1.25rem;flex-wrap:wrap;">
                <div class="avatar-ring">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                <div>
                    <p
                        style="font-size:0.7rem;letter-spacing:0.2em;text-transform:uppercase;color:#dc2626;margin-bottom:0.25rem;">
                        My Account</p>
                    <h1
                        style="font-family:'Playfair Display',serif;font-size:2rem;font-weight:700;color:#f1f5f9;margin:0;">
                        {{ $user->name }}</h1>
                    <p style="color:#64748b;font-size:0.82rem;margin-top:0.2rem;">{{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Main --}}
    <div style="max-width:1000px;margin:0 auto;padding:2rem 1.5rem;">

        @if(session('success'))
        <div class="success-banner"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif

        {{-- Tabs --}}
        <div class="tab-nav">
            <button class="tab-btn active" onclick="switchTab('overview', this)">
                <i class="fas fa-user"></i> Profile Info
            </button>
            <button class="tab-btn" onclick="switchTab('orders', this)">
                <i class="fas fa-receipt"></i> My Orders
                @if($orders->count() > 0)
                <span style="background:#dc2626;color:white;font-size:0.65rem;padding:2px 6px;border-radius:999px;">{{
                    $orders->count() }}</span>
                @endif
            </button>
            <button class="tab-btn" onclick="switchTab('reservations', this)">
                <i class="fas fa-calendar-alt"></i> My Reservations
                @if($bookings->count() > 0)
                <span style="background:#dc2626;color:white;font-size:0.65rem;padding:2px 6px;border-radius:999px;">{{
                    $bookings->count() }}</span>
                @endif
            </button>
        </div>

        {{-- TAB 1: Profile Info --}}
        <div id="tab-overview" class="tab-panel active">
            <div class="info-card" style="margin-bottom:1.25rem;">
                <div
                    style="padding:1rem 1.25rem;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;">
                    <div>
                        <div style="font-weight:700;color:#1e293b;font-size:0.95rem;">Personal Information</div>
                        <div style="font-size:0.75rem;color:#94a3b8;margin-top:2px;">Your account details</div>
                    </div>
                    <a href="{{ route('user.profile.edit') }}" class="edit-btn">
                        <i class="fas fa-pen" style="margin-right:4px;"></i> Edit Profile
                    </a>
                </div>
                <div class="info-row">
                    <span class="info-label">Full Name</span>
                    <span class="info-value">{{ $user->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value">{{ $user->email }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Phone</span>
                    <span class="info-value">{{ $user->phone ?? '—' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Address</span>
                    <span class="info-value">{{ $user->address ?? '—' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Member Since</span>
                    <span class="info-value">{{ $user->created_at->format('d M Y') }}</span>
                </div>
            </div>

            {{-- Quick Stats --}}
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;">
                <div class="info-card" style="padding:1.25rem;text-align:center;">
                    <div style="font-size:2rem;font-weight:700;color:#dc2626;">{{ $orders->count() }}</div>
                    <div
                        style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">
                        Total Orders</div>
                </div>
                <div class="info-card" style="padding:1.25rem;text-align:center;">
                    <div style="font-size:2rem;font-weight:700;color:#16a34a;">{{
                        $orders->where('delivery_status','delivered')->count() }}</div>
                    <div
                        style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">
                        Delivered</div>
                </div>
                <div class="info-card" style="padding:1.25rem;text-align:center;">
                    <div style="font-size:2rem;font-weight:700;color:#3730a3;">{{ $bookings->count() }}</div>
                    <div
                        style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;margin-top:4px;">
                        Reservations</div>
                </div>
            </div>
        </div>

        {{-- TAB 2: My Orders --}}
        <div id="tab-orders" class="tab-panel">
            @if($orders->count() === 0)
            <div class="info-card">
                <div class="empty-msg">
                    <i class="fas fa-receipt" style="color:#dc2626;opacity:0.4;"></i>
                    <p style="font-weight:600;color:#475569;">No orders yet</p>
                    <p style="font-size:0.82rem;">Browse our menu and place your first order!</p>
                    <a href="{{ url('/#blog') }}" style="color:#dc2626;font-weight:600;font-size:0.85rem;">Explore Menu
                        →</a>
                </div>
            </div>
            @else
            <div class="info-card">
                @foreach($orders as $order)
                @php
                $s = strtolower($order->delivery_status);
                $pc = $s==='delivered' ? 's-delivered' : ($s==='on the way' ? 's-onway' : ($s==='canceled' ?
                's-canceled' : 's-progress'));
                $sl = $s==='delivered' ? 'Delivered' : ($s==='on the way' ? 'On the Way' : ($s==='canceled' ? 'Canceled'
                : 'In Progress'));
                @endphp
                <div class="order-item">
                    <img src="{{ asset('food_img/' . $order->food_image) }}" class="order-img"
                        alt="{{ $order->titile }}">
                    <div style="flex:1;min-width:0;">
                        <div
                            style="font-weight:700;color:#1e293b;font-size:0.9rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                            {{ $order->titile }}</div>
                        <div style="font-size:0.78rem;color:#64748b;margin-top:2px;">
                            Qty: {{ $order->quantity }} &bull;
                            <span style="color:#dc2626;font-weight:600;">{{ $order->price }} Taka</span>
                        </div>
                        <div style="font-size:0.72rem;color:#94a3b8;margin-top:2px;">{{ $order->created_at ?
                            $order->created_at->format('d M Y, h:i A') : '' }}</div>
                    </div>
                    <span class="status-pill {{ $pc }}">{{ $sl }}</span>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        {{-- TAB 3: My Reservations --}}
        <div id="tab-reservations" class="tab-panel">
            @if($bookings->count() === 0)
            <div class="info-card">
                <div class="empty-msg">
                    <i class="fas fa-calendar-alt" style="color:#dc2626;opacity:0.4;"></i>
                    <p style="font-weight:600;color:#475569;">No reservations yet</p>
                    <p style="font-size:0.82rem;">Book a table and enjoy a perfect dining experience!</p>
                    <a href="{{ url('/#book-table') }}" style="color:#dc2626;font-weight:600;font-size:0.85rem;">Book a
                        Table →</a>
                </div>
            </div>
            @else
            <div class="info-card">
                {{-- Header row --}}
                <div
                    style="display:grid;grid-template-columns:1fr 1fr 1fr auto;gap:1rem;padding:0.75rem 1.25rem;background:#f8fafc;border-bottom:1px solid #e2e8f0;">
                    <div
                        style="font-size:0.7rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;color:#94a3b8;">
                        Date & Time</div>
                    <div
                        style="font-size:0.7rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;color:#94a3b8;">
                        Guests</div>
                    <div
                        style="font-size:0.7rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;color:#94a3b8;">
                        Message</div>
                    <div
                        style="font-size:0.7rem;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;color:#94a3b8;">
                        Status</div>
                </div>
                @foreach($bookings as $booking)
                @php
                $bs = strtolower($booking->status ?? 'pending');
                $bc = $bs==='confirmed' ? 'b-confirmed' : ($bs==='canceled' ? 'b-canceled' : 'b-pending');
                $bl = ucfirst($bs);
                @endphp
                <div class="booking-item">
                    <div>
                        <div style="font-weight:700;color:#1e293b;font-size:0.9rem;">{{
                            \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</div>
                        <div style="font-size:0.78rem;color:#64748b;margin-top:2px;"><i class="fas fa-clock"
                                style="margin-right:4px;"></i>{{ $booking->time }}</div>
                    </div>
                    <div style="font-size:0.85rem;color:#1e293b;">
                        <i class="fas fa-users" style="color:#64748b;margin-right:6px;"></i>{{ $booking->people ??
                        $booking->guest }} Guests
                    </div>
                    <div
                        style="font-size:0.82rem;color:#64748b;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                        {{ $booking->message ? \Illuminate\Support\Str::limit($booking->message, 40) : '—' }}
                    </div>
                    <span class="status-pill {{ $bc }}">{{ $bl }}</span>
                </div>
                @endforeach
            </div>
            @endif

            <div style="margin-top:1rem;text-align:right;">
                <a href="{{ url('/#book-table') }}" class="edit-btn"><i class="fas fa-plus"
                        style="margin-right:4px;"></i> New Reservation</a>
            </div>
        </div>

    </div>

    <script>
        function switchTab(name, btn) {
            document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.getElementById('tab-' + name).classList.add('active');
            btn.classList.add('active');
        }
    </script>

    @include('home.js')
</body>

</html>