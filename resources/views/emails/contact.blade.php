<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333333;
        }
        p {
            font-size: 16px;
            color: #555555;
        }
        .message-content {
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            border: 1px solid #dddddd;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #aaaaaa;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>New message from: {{ $name }} ({{ $email }})</h2>
        <p><strong>Message:</strong></p>
        <div class="message-content">
            <p>{{ $messageContent }}</p>
        </div>
        <p>Thank you.</p>
        <div class="footer">
            <p>&copy; 2024 Dialus.lk. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
