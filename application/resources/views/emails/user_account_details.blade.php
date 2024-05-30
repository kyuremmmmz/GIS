<!DOCTYPE html>
<html>
<head>
    <title>Your Account Details</title>
</head>
<body>
    <h1>Welcome, {{ $name }}!</h1>
    <p>Your account has been created successfully. Here are your details:</p>
    <p><strong>Committee ID:</strong> {{ $comitteeID }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>
    <p>Please keep this information safe.</p>
</body>
</html>
