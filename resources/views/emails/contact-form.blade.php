<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form Inquiry</title>
</head>
<body style="font-family: Arial, sans-serif; color: #1a2b4a; line-height: 1.6; margin: 0; padding: 24px;">
    <h2 style="margin: 0 0 16px; color: #1a2b4a;">New Contact Form Inquiry</h2>

    <p style="margin: 0 0 8px;"><strong>Name:</strong> {{ $senderName }}</p>
    <p style="margin: 0 0 8px;"><strong>Email:</strong> {{ $senderEmail }}</p>
    <p style="margin: 0 0 8px;"><strong>Subject:</strong> {{ $formSubject }}</p>

    <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 20px 0;">

    <p style="margin: 0 0 8px;"><strong>Message:</strong></p>
    <p style="margin: 0; white-space: pre-wrap;">{{ $messageBody }}</p>
</body>
</html>
