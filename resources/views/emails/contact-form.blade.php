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
    @if($company)
        <p style="margin: 0 0 8px;"><strong>Company:</strong> {{ $company }}</p>
    @endif
    @if($phone)
        <p style="margin: 0 0 8px;"><strong>Phone:</strong> {{ $phone }}</p>
    @endif
    <p style="margin: 0 0 8px;"><strong>Location / Island:</strong> {{ $location }}</p>
    <p style="margin: 0 0 8px;"><strong>Urgency:</strong> {{ $urgency }}</p>
    <p style="margin: 0 0 8px;"><strong>Equipment Type:</strong> {{ $equipmentType }}</p>
    @if($service)
        <p style="margin: 0 0 8px;"><strong>Service Required:</strong> {{ $service }}</p>
    @endif

    <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 20px 0;">

    <p style="margin: 0 0 8px;"><strong>Problem Description:</strong></p>
    <p style="margin: 0; white-space: pre-wrap;">{{ $problemDescription }}</p>

    @if($attachment)
        <p style="margin: 16px 0 0;"><strong>Attachment:</strong> Included with this email.</p>
    @endif
</body>
</html>
