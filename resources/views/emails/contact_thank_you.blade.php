<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thank You for Contacting Us</title>
</head>
<body>
    <h2>Hi {{ $data['name'] }},</h2>
    <p>Thank you for reaching out to Skill Exchange!</p>
    <p>We have received your message:</p>
    <blockquote>
        <strong>Subject:</strong> {{ $data['subject'] }}<br>
        <strong>Message:</strong> {{ $data['message'] }}
    </blockquote>
    <p>We will get back to you as soon as possible.</p>
    <p>Regards,<br>Skill Exchange Team</p>
</body>
</html>
