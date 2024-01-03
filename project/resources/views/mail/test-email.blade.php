<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Test Email</title>

    <style>
        p{
            font-size: 12px;
        }

        .signature{
            font-style: italic;
        }
    </style>
</head>
<body>
    <div>
        <p>Hi {{ $name }},</p>
        <p>This is a test email.</p>
        <p>Regards,</p>
        <p class="signature">UP</p>
    </div>
</body>
</html>