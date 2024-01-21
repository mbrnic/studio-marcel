<!DOCTYPE html>
<html>
<head>
    <title>Laravel Mail</title>
</head>
<body>
    <h1>{{ $data['message'] }}</h1>
    <p>From: {{ $data['name'] }}</p>
    <p>Email: {{ $data['email'] }}</p>
    <p>Phone: {{ $data['phone'] }}</p>
</body>
</html>