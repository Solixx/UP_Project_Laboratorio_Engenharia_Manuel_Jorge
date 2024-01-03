<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Validate Newslleter Email</title>

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
        <p>Hi,</p>
        <p>Thank you for subscribing to our newsletter.</p>
        <p>Best regards,</p>
        <p>Click here to validate your email!</p>
        <a href="{{ $url }}">Validate</a>
        <p class="signature">UP</p>
    </div>
</body>
</html>