<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Notification</title>
</head>
<body>
    @if($isCustomer)
        <h2>Hi {{ $booking->full_name }},</h2>
        <p>Thank you for your travel booking request. We have received the following details:</p>
    @else
        <h2>New Booking Received</h2>
        <p>A new travel booking request has been submitted:</p>
    @endif

    <ul>
        <li><strong>Full Name:</strong> {{ $booking->full_name }}</li>
        <li><strong>Email:</strong> {{ $booking->email }}</li>
        <li><strong>Phone:</strong> {{ $booking->phone }}</li>
        <li><strong>Nationality:</strong> {{ $booking->nationality }}</li>
        <li><strong>Destination:</strong> {{ $booking->destination }}</li>
        <li><strong>Trip Type:</strong> {{ $booking->trip_type }}</li>
        <li><strong>Departure:</strong> {{ $booking->departure_date }}</li>
        <li><strong>Return:</strong> {{ $booking->return_date }}</li>
        <li><strong>Adults:</strong> {{ $booking->adults }}</li>
        <li><strong>Children:</strong> {{ $booking->children ?? '0' }}</li>
        <li><strong>Infants:</strong> {{ $booking->infants ?? '0' }}</li>
        <li><strong>Accommodation:</strong> {{ $booking->accommodation }}</li>
        <li><strong>Budget:</strong> {{ $booking->budget }}</li>
        <li><strong>Services:</strong> {{ $booking->services ? implode(', ', json_decode($booking->services)) : 'None' }}</li>
        <li><strong>Special Requests:</strong> {{ $booking->special_requests ?? 'None' }}</li>
    </ul>

    @if($isCustomer)
        <p>We will contact you shortly to finalize the arrangements.</p>
        <p>Thank you for choosing us!</p>
    @endif
</body>
</html>
