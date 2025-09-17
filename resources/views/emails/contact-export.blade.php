<h2>All Form Submissions (Contact Info Only)</h2>

<table border="1" cellpadding="6" cellspacing="0" style="border-collapse: collapse; font-family: sans-serif; font-size: 14px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Submitted At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact['Name'] }}</td>
                <td>{{ $contact['Email'] }}</td>
                <td>{{ $contact['Phone'] }}</td>
                <td>{{ $contact['Submitted At'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
