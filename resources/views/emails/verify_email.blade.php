<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email Address</title>
</head>
<body>
    <h2>Hi {{ $user->name }},</h2>
    <p>Thank you for registering at Skill Exchange.</p>
    <p>Please click the link below to verify your email address:</p>
    <p><a href="{{ $verifyUrl }}">Verify Email</a></p>
    <p>If you did not register, you can ignore this email.</p>
    <p>Regards,<br>Skill Exchange Team</p>
</body>
</html>
