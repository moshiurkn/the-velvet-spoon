<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders – The Velvet Spoon</title>
    @include('home.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
        }

        .page-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            padding: 7rem 0 3rem;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: linear-gradient(rgba(220, 38, 38, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(220, 38, 38, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.04em;
        }

        .status-progress {
            background: #fef3c7;
            color: #92400e;
            border: 1px solid #fcd34d;
        }

        .status-on-the-way {
            background: #e0e7ff;
            color: #3730a3;
            border: 1px solid #a5b4fc;
        }

        .status-delivered {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
        }

        .status-canceled {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            display: inline-block;
            flex-shrink: 0;
        }

        .dot-progress {
            background: #d97706;
        }

        .dot-on-the-way {
            background: #4f46e5;
            animation: pulse 1.8s infinite;
        }

        .dot-delivered {
            background: #16a34a;
        }

        .dot-canceled {
            background: #dc2626;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.4;
            }
        }

        .order-card {
            background: white;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            transition: box-shadow 0.2s, transform 0.2s;
        }

        .order-card:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            transform: translateY(-1px);
        }

        .timeline-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            flex: 1;
        }

        .timeline-icon {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            border: 2px solid;
        }

        .timeline-line {
            flex: 1;
            height: 2px;
            margin-bottom: 20px;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }
    </style>
</head>

<body>

    {{-- Navbar only (no hero) --}}
    @include('home.navbar')

    {{-- Page Header --}}
    <div class="page-header">
        <div style="max-width:1100px;margin:0 auto;padding:0 1.5rem;position:relative;z-index:1;">
            <p
                style="font-size:0.7rem;letter-spacing:0.2em;text-transform:uppercase;color:#dc2626;margin-bottom:0.5rem;">
                Your Account</p>
            <h1 style="font-family:'Playfair Display',serif;font-size:2.5rem;font-weight:700;color:#f1f5f9;margin:0;">My
                Orders</h1>
            <p style="color:#64748b;margin-top:0.5rem;font-size:0.9rem;">Track and review all your food orders</p>
        </div>
    </div>

    {{-- Main Content --}}
    <div style="max-width:1100px;margin:0 auto;padding:2.5rem 1.5rem;">

        @if($orders->count() === 0)
        <div class="empty-state">
            <div
                style="width:80px;height:80px;background:#fee2e2;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem;">
                <i class="fas fa-receipt" style="font-size:2rem;color:#dc2626;"></i>
            </div>
            <h3 style="font-size:1.3rem;font-weight:700;color:#1e293b;margin-bottom:0.5rem;">No orders yet</h3>
            <p style="color:#64748b;margin-bottom:1.5rem;">Looks like you haven't placed any orders. Browse our menu and
                place your first order!</p>
            <a href="{{ url('/#blog') }}"
                style="background:#dc2626;color:white;padding:0.75rem 2rem;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.9rem;display:inline-block;transition:background 0.2s;"
                onmouseover="this.style.background='#b91c1c'" onmouseout="this.style.background='#dc2626'">
                <i class="fas fa-utensils" style="margin-right:8px;"></i> Explore Menu
            </a>
        </div>
        @else
        {{-- Summary bar --}}
        <div style="display:flex;gap:1rem;flex-wrap:wrap;margin-bottom:2rem;">
            @php
            $total = $orders->count();
            $delivered = $orders->where('delivery_status','delivered')->count();
            $active = $orders->whereIn('delivery_status',['in progress','on the way'])->count();
            $canceled = $orders->where('delivery_status','canceled')->count();
            @endphp
            <div
                style="background:white;border:1px solid #e2e8f0;border-radius:10px;padding:1rem 1.5rem;min-width:120px;text-align:center;">
                <div style="font-size:1.8rem;font-weight:700;color:#1e293b;">{{ $total }}</div>
                <div style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Total</div>
            </div>
            <div
                style="background:white;border:1px solid #e2e8f0;border-radius:10px;padding:1rem 1.5rem;min-width:120px;text-align:center;">
                <div style="font-size:1.8rem;font-weight:700;color:#4f46e5;">{{ $active }}</div>
                <div style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Active
                </div>
            </div>
            <div
                style="background:white;border:1px solid #e2e8f0;border-radius:10px;padding:1rem 1.5rem;min-width:120px;text-align:center;">
                <div style="font-size:1.8rem;font-weight:700;color:#16a34a;">{{ $delivered }}</div>
                <div style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Delivered
                </div>
            </div>
            <div
                style="background:white;border:1px solid #e2e8f0;border-radius:10px;padding:1rem 1.5rem;min-width:120px;text-align:center;">
                <div style="font-size:1.8rem;font-weight:700;color:#dc2626;">{{ $canceled }}</div>
                <div style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Canceled
                </div>
            </div>
        </div>

        {{-- Order Cards --}}
        <div style="display:flex;flex-direction:column;gap:1rem;">
            @foreach($orders as $order)
            @php
            $status = strtolower($order->delivery_status);
            if ($status === 'delivered') {
            $pillClass = 'status-delivered'; $dotClass = 'dot-delivered'; $statusLabel = 'Delivered';
            } elseif ($status === 'on the way') {
            $pillClass = 'status-on-the-way'; $dotClass = 'dot-on-the-way'; $statusLabel = 'On the Way';
            } elseif ($status === 'canceled') {
            $pillClass = 'status-canceled'; $dotClass = 'dot-canceled'; $statusLabel = 'Canceled';
            } else {
            $pillClass = 'status-progress'; $dotClass = 'dot-progress'; $statusLabel = 'In Progress';
            }
            @endphp
            <div class="order-card">
                {{-- Card Header --}}
                <div
                    style="padding:1rem 1.25rem;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:0.5rem;">
                    <div style="display:flex;align-items:center;gap:0.75rem;">
                        <div
                            style="width:36px;height:36px;background:#fee2e2;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-utensils" style="color:#dc2626;font-size:14px;"></i>
                        </div>
                        <div>
                            <div style="font-weight:600;font-size:0.9rem;color:#1e293b;">Order #{{ $order->id }}</div>
                            <div style="font-size:0.72rem;color:#94a3b8;">{{ $order->created_at ?
                                $order->created_at->format('d M Y, h:i A') : 'N/A' }}</div>
                        </div>
                    </div>
                    <span class="status-pill {{ $pillClass }}">
                        <span class="status-dot {{ $dotClass }}"></span>
                        {{ $statusLabel }}
                    </span>
                </div>

                {{-- Card Body --}}
                <div style="padding:1.25rem;display:flex;align-items:center;gap:1.25rem;flex-wrap:wrap;">
                    <img src="{{ asset('food_img/' . $order->food_image) }}" alt="{{ $order->titile }}"
                        style="width:70px;height:70px;object-fit:cover;border-radius:10px;border:2px solid #f1f5f9;flex-shrink:0;">
                    <div style="flex:1;min-width:160px;">
                        <div style="font-weight:700;font-size:1rem;color:#1e293b;">{{ $order->titile }}</div>
                        <div style="font-size:0.8rem;color:#64748b;margin-top:3px;">
                            <span>Qty: <strong>{{ $order->quantity }}</strong></span>
                            <span style="margin:0 8px;color:#cbd5e1;">•</span>
                            <span style="color:#dc2626;font-weight:700;">{{ $order->price }} Taka</span>
                        </div>
                    </div>
                    <div style="text-align:right;font-size:0.8rem;color:#64748b;min-width:130px;">
                        <div><i class="fas fa-map-marker-alt" style="color:#dc2626;margin-right:4px;"></i>{{
                            $order->address }}</div>
                        <div style="margin-top:3px;"><i class="fas fa-phone"
                                style="color:#64748b;margin-right:4px;"></i>{{ $order->phone }}</div>
                    </div>
                </div>

                {{-- Order Progress Timeline --}}
                <div style="padding:1rem 1.25rem;background:#f8fafc;border-top:1px solid #f1f5f9;">
                    <div style="display:flex;align-items:center;gap:0;">

                        {{-- Step 1: Order Placed --}}
                        @php $step1 = in_array($status, ['in progress','on the way','delivered']); @endphp
                        <div class="timeline-step">
                            <div class="timeline-icon"
                                style="background:{{ $step1 ? '#dc2626' : '#f1f5f9' }};border-color:{{ $step1 ? '#dc2626' : '#e2e8f0' }};color:{{ $step1 ? 'white' : '#94a3b8' }};">
                                <i class="fas fa-check" style="font-size:12px;"></i>
                            </div>
                            <span
                                style="font-size:0.65rem;color:{{ $step1 ? '#dc2626' : '#94a3b8' }};font-weight:600;text-align:center;line-height:1.2;">Order<br>Placed</span>
                        </div>

                        <div class="timeline-line"
                            style="background:{{ $status === 'on the way' || $status === 'delivered' ? '#dc2626' : '#e2e8f0' }};">
                        </div>

                        {{-- Step 2: On the Way --}}
                        @php $step2 = in_array($status, ['on the way','delivered']); @endphp
                        <div class="timeline-step">
                            <div class="timeline-icon"
                                style="background:{{ $step2 ? '#4f46e5' : '#f1f5f9' }};border-color:{{ $step2 ? '#4f46e5' : '#e2e8f0' }};color:{{ $step2 ? 'white' : '#94a3b8' }};">
                                <i class="fas fa-motorcycle" style="font-size:12px;"></i>
                            </div>
                            <span
                                style="font-size:0.65rem;color:{{ $step2 ? '#4f46e5' : '#94a3b8' }};font-weight:600;text-align:center;line-height:1.2;">On
                                the<br>Way</span>
                        </div>

                        <div class="timeline-line"
                            style="background:{{ $status === 'delivered' ? '#16a34a' : '#e2e8f0' }};"></div>

                        {{-- Step 3: Delivered --}}
                        @php $step3 = $status === 'delivered'; @endphp
                        <div class="timeline-step">
                            <div class="timeline-icon"
                                style="background:{{ $step3 ? '#16a34a' : '#f1f5f9' }};border-color:{{ $step3 ? '#16a34a' : '#e2e8f0' }};color:{{ $step3 ? 'white' : '#94a3b8' }};">
                                <i class="fas fa-home" style="font-size:12px;"></i>
                            </div>
                            <span
                                style="font-size:0.65rem;color:{{ $step3 ? '#16a34a' : '#94a3b8' }};font-weight:600;text-align:center;line-height:1.2;">Delivered</span>
                        </div>

                    </div>

                    @if($status === 'canceled')
                    <div style="text-align:center;margin-top:0.5rem;">
                        <span style="font-size:0.75rem;color:#dc2626;font-weight:600;"><i class="fas fa-times-circle"
                                style="margin-right:4px;"></i>This order was canceled</span>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div style="text-align:center;margin-top:2rem;">
            <a href="{{ url('/#blog') }}" style="color:#dc2626;text-decoration:none;font-size:0.9rem;font-weight:600;">
                <i class="fas fa-plus" style="margin-right:6px;"></i>Place a New Order
            </a>
        </div>
        @endif
    </div>

    @include('home.js')
</body>

</html>