<h2>Booking Submissions Summary</h2>
<p>Total submissions: {{ $submissions->count() }}</p>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Booking Type</th>
            <th>Submitted</th>
        </tr>
    </thead>
    <tbody>
        @foreach($submissions as $submission)
            @php $data = json_decode($submission->payload, true); @endphp
            <tr>
                <td>{{ $data['name'] ?? 'N/A' }}</td>
                <td>{{ $data['email'] ?? 'N/A' }}</td>
                <td>{{ $data['phone'] ?? 'N/A' }}</td>
                <td>{{ $data['booking_type'] ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($submission->created_at)->format('M d, Y h:i A') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
