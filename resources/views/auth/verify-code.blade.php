<!DOCTYPE html>
<html>
<head>
    <title>2FA Code</title>
</head>
<body>
<h2>Ikki bosqichli xavfsizlik</h2>
<form method="POST" action="{{ route('verify.code') }}">
    @csrf
    <label for="code">Maxsus kodni kiriting:</label>
    <input type="text" name="code" required>
    <button type="submit">Tasdiqlash</button>
</form>

@if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
</body>
</html>
