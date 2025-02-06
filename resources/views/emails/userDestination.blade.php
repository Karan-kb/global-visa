<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank You for Contacting {{ $company_name}}</title>
</head>

<body style="font-family: 'Arial', sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 20px;">

    <div
        style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

     

        <h1>Thank You for Contacting Us!</h1>

        <p>Dear {{ $name }},</p>

        <p>We have received your message and want to express our gratitude for reaching out to {{ $company_name }}.</p>

        <p>Please be assured that our team is reviewing your inquiry about {{ $countryName }}, and we will get back to you shortly.</p>

        <p>We appreciate your interest and look forward to assisting you.</p>

        <hr>

        <p>Best regards,</p>
        <p>{{ $company_name }}</p>
    </div>

</body>

</html>
