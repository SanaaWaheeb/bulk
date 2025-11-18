<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OTP Test</title>
</head>
<body>
    <h2>OTP Test Page</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('otp.send') }}">
        @csrf
        <label>Phone Number:</label><br>
        <input type="text" name="phone" placeholder="+9665XXXXXXX" required><br><br>
        <button type="submit">Send OTP</button>
    </form>

    <hr>

    <form method="POST" action="{{ route('otp.verify') }}">
        @csrf
        <label>Phone Number:</label><br>
        <input type="text" name="phone" placeholder="+9665XXXXXXX" required><br><br>

        <label>Enter OTP Code:</label><br>
        <input type="text" name="otp_code" required><br><br>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
