<!DOCTYPE html>
<html>
<head>
    <title>reCAPTCHA Test</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
</head>
<body>
    <h1>reCAPTCHA v3 Test Page</h1>
    
    <p><strong>Site Key:</strong> {{ config('services.recaptcha.site_key') }}</p>
    <p><strong>Secret Key Set:</strong> {{ config('services.recaptcha.secret_key') ? 'Yes' : 'No' }}</p>
    
    <button onclick="testRecaptcha()">Test reCAPTCHA Token Generation & Verification</button>
    
    <div id="result" style="margin-top: 20px; padding: 10px; border: 1px solid #ccc;"></div>
    
    <script>
        function testRecaptcha() {
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = '<p>Loading...</p>';
            
            grecaptcha.ready(function() {
                grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'test'})
                    .then(function(token) {
                        resultDiv.innerHTML = '<p><strong>✓ Token Generated</strong></p>' +
                            '<p>Length: ' + token.length + '</p>' +
                            '<p>Preview: ' + token.substring(0, 100) + '...</p>' +
                            '<p>Now verifying with Google...</p>';
                        
                        // Send token to backend for verification
                        fetch('/test-recaptcha-verify', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({ token: token })
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Verification result:', data);
                            
                            let html = '<h3>Verification Result:</h3>';
                            html += '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
                            
                            if (data.google_response.success) {
                                html += '<p style="color: green; font-weight: bold;">✓ SUCCESS! Score: ' + data.google_response.score + '</p>';
                            } else {
                                html += '<p style="color: red; font-weight: bold;">✗ FAILED</p>';
                                html += '<p>Error codes: ' + JSON.stringify(data.google_response['error-codes']) + '</p>';
                            }
                            
                            resultDiv.innerHTML = html;
                        })
                        .catch(error => {
                            resultDiv.innerHTML = '<p style="color: red;">Fetch error: ' + error + '</p>';
                        });
                    })
                    .catch(function(error) {
                        resultDiv.innerHTML = '<p style="color: red;"><strong>✗ Token Generation Failed</strong></p>' +
                            '<p>Error: ' + error + '</p>';
                    });
            });
        }
    </script>
</body>
</html>