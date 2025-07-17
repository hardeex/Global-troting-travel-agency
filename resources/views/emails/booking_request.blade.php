<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Booking/Contact Request</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .email-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            position: relative;
        }

        .header {
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            animation: float 20s linear infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            100% { transform: translateY(-50px) rotate(360deg); }
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .booking-type {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            backdrop-filter: blur(10px);
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .content {
            padding: 40px 30px;
        }

        .customer-info {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 5px solid #0ea5e9;
        }

        .customer-info h2 {
            color: #1e293b;
            font-size: 20px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .customer-info h2::before {
            content: '👤';
            font-size: 24px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }

        .info-item {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.2s ease;
        }

        .info-item:hover {
            transform: translateY(-2px);
        }

        .info-item strong {
            color: #0ea5e9;
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-item span {
            color: #334155;
            font-size: 16px;
        }

        .booking-details {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            border: 2px solid #e0f2fe;
        }

        .booking-details h3 {
            color: #1e293b;
            font-size: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .booking-details h3::before {
            content: '📋';
            font-size: 24px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .detail-card {
            background: linear-gradient(135deg, #fafafa 0%, #f1f5f9 100%);
            border-radius: 12px;
            padding: 20px;
            border-left: 4px solid #10b981;
            transition: all 0.3s ease;
        }

        .detail-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .detail-card strong {
            color: #059669;
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: capitalize;
        }

        .detail-card span {
            color: #374151;
            font-size: 16px;
            font-weight: 500;
        }

        .message-section {
            background: linear-gradient(135deg, #fefce8 0%, #fef3c7 100%);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 5px solid #f59e0b;
        }

        .message-section h4 {
            color: #92400e;
            font-size: 18px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .message-section h4::before {
            content: '💬';
            font-size: 20px;
        }

        .message-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            font-style: italic;
            line-height: 1.7;
            color: #374151;
        }

        .footer {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .timestamp {
            display: inline-block;
            background: rgba(255,255,255,0.1);
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 15px;
            backdrop-filter: blur(10px);
        }

        .footer p {
            opacity: 0.8;
            font-size: 14px;
        }

        .priority-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .booking-type-icons {
            display: inline-block;
            margin-right: 10px;
            font-size: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .content {
                padding: 20px 15px;
            }

            .header {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .customer-info,
            .booking-details,
            .message-section {
                padding: 20px;
            }
        }

        /* Print Styles */
        @media print {
            body {
                background: white;
                padding: 0;
            }

            .email-container {
                box-shadow: none;
                border-radius: 0;
            }

            .header {
                background: #0ea5e9 !important;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }

            .priority-badge {
                position: static;
                display: inline-block;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="priority-badge">New Request</div>
        
        <div class="header">
            <div class="header-content">
                <div class="booking-type">
                    <span class="booking-type-icons">
                        @if($data['booking_type'] === 'car') 🚗
                        @elseif($data['booking_type'] === 'flight') ✈️
                        @elseif($data['booking_type'] === 'hotel') 🏨
                        @elseif($data['booking_type'] === 'activity') 🗺️
                        @elseif($data['booking_type'] === 'custom') ✨
                        @else 💬
                        @endif
                    </span>
                    {{ ucfirst($data['booking_type']) }} Request
                </div>
                <h1>New Booking Inquiry</h1>
                <p>A new travel request has been submitted and requires your attention</p>
            </div>
        </div>

        <div class="content">
            <div class="customer-info">
                <h2>Customer Information</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <strong>Full Name</strong>
                        <span>{{ $data['name'] }}</span>
                    </div>
                    <div class="info-item">
                        <strong>Email Address</strong>
                        <span>{{ $data['email'] }}</span>
                    </div>
                    @if($data['phone'])
                    <div class="info-item">
                        <strong>Phone Number</strong>
                        <span>{{ $data['phone'] }}</span>
                    </div>
                    @endif
                    @if($data['preferred_contact'])
                    <div class="info-item">
                        <strong>Preferred Contact</strong>
                        <span>{{ ucfirst($data['preferred_contact']) }}</span>
                    </div>
                    @endif
                </div>
            </div>

            @php
                $excludedKeys = ['name', 'email', 'phone', 'preferred_contact', 'message', 'booking_type'];
                $bookingDetails = array_filter($data, function($value, $key) use ($excludedKeys) {
                    return !in_array($key, $excludedKeys) && $value;
                }, ARRAY_FILTER_USE_BOTH);
            @endphp

            @if(count($bookingDetails) > 0)
            <div class="booking-details">
                <h3>Booking Details</h3>
                <div class="details-grid">
                    @foreach($bookingDetails as $key => $value)
                    <div class="detail-card">
                        <strong>{{ ucwords(str_replace('_', ' ', $key)) }}</strong>
                        <span>{{ $value }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if(!empty($data['message']))
            <div class="message-section">
                <h4>Customer Message</h4>
                <div class="message-content">
                    "{{ $data['message'] }}"
                </div>
            </div>
            @endif
        </div>

        <div class="footer">
            <div class="timestamp">
                📅 Received: {{ now()->toDayDateTimeString() }}
            </div>
            <p>Please respond to this inquiry within 24 hours for optimal customer service.</p>
        </div>
    </div>
</body>
</html>